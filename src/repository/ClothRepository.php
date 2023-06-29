<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Cloth.php';

class ClothRepository extends Repository
{

    public function getCloth(int $id): ?Cloth
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.clothes WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $cloth = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cloth == false) {
            return null;
        }

        return new Cloth(
            $cloth['title'],
            $cloth['description'],
            $cloth['image']
        );
    }

    public function addCloth(Cloth $cloth): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO clothes (title, description, image, created_at, id_assigned_by)
            VALUES (?, ?, ?, ?, ?)
        ');

        
        $assignedById = 1;

        $stmt->execute([
            $cloth->getTitle(),
            $cloth->getDescription(),
            $cloth->getImage(),
            $date->format('Y-m-d'),
            $assignedById
        ]);
    }

    public function getClothes(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM clothes;
        ');
        $stmt->execute();
        $clothes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($clothes as $cloth) {
            $result[] = new Cloth(
                $cloth['title'],
                $cloth['description'],
                $cloth['image'],
                $cloth['like'],
                $cloth['dislike'],
                $cloth['id']
            );
        }

        return $result;
    }

    public function getClothByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM clothes WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function like(int $id) {
         $stmt = $this->database->connect()->prepare('
            UPDATE clothes SET "like" = "like" + 1 WHERE id = :id
         ');

         $stmt->bindParam(':id', $id, PDO::PARAM_INT);
         $stmt->execute();
    }

    public function dislike(int $id) {
        $stmt = $this->database->connect()->prepare('
            UPDATE clothes SET dislike = dislike + 1 WHERE id = :id
         ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}