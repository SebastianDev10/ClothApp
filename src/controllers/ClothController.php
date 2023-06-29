<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Cloth.php';
require_once __DIR__ . '/../repository/ClothRepository.php';

class ClothController extends AppController
{

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';

    private $message = [];
    private $clothRepository;

    public function __construct()
    {
        parent::__construct();
        $this->clothRepository = new ClothRepository();
    }

    public function clothes()
    {
        $clothes = $this->clothRepository->getClothes();
        $this->render('clothes', ['clothes' => $clothes]);
    }

    public function addCloth()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            
            $cloth = new Cloth($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->clothRepository->addCloth($cloth);

            return $this->render('clothes', [
                'messages' => $this->message,
                'clothes' => $this->clothRepository->getClothes()
            ]);
        }
        

        return $this->render('add-cloth', ['messages' => $this->message]);
    }

    public function addClothing(){
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/addCloth");
    }


    public function contact1(){
        
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/contact");
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->clothRepository->getClothByTitle($decoded['search']));
        }
    }

    public function like(int $id) {
        $this->clothRepository->like($id);
        http_response_code(200);
    }

    public function dislike(int $id) {
        $this->clothRepository->dislike($id);
        http_response_code(200);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}