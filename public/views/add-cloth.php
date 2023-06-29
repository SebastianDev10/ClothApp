<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">

    <script src="https://kit.fontawesome.com/e913638b7c.js" crossorigin="anonymous"></script>
    <title>ADDCLOTHES</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <i class="fa-solid fa-address-card"></i>
                    <a href="/aboutus" class="button">About us

                    </a>
                </li>
                
                <li>
                    <i class="fa-solid fa-shirt"></i>
                    <a href="/clothes" class="button">Clothes
                    
                    </a>
                </li>
                <li>
                    <i class="fa-solid fa-user"></i>
                    <a href="/contact" class="button">Contact

                    </a>
                </li>
                <li>
                    <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i>
                    <a href="/logout" class="button">Logout

                    </a>
                </li>
                
            </ul>

        </nav>
        <main>
            
            <section class="project-form">
                <h1>UPLOAD</h1>
                <form action="addCloth" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input name="title" type="text" placeholder="title">
                    <textarea name="description" rows=3 placeholder="description"></textarea>

                    <input type="file" name="file"/><br/>
                    <button type="submit">send</button>
                </form>
            </section>
        </main>
    </div>
</body>