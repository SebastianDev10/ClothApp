

<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">

    <script src="https://kit.fontawesome.com/e913638b7c.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>

    
    
    <title>CLOTHES</title>
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
                    <i class="fa-solid fa-address-book"></i>
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
            <header>
                <div class="search-bar">
                    <input placeholder="search project">
                </div>
                
                <div class="add-project">
                    <a href="/addCloth">
                    <i class="fas fa-plus"></i> Add cloth
                    </a>
            
                </div>
            
            </header>
            
            <section class="projects">
                <?php foreach ($clothes as $cloth): ?>
                    <div id="<?= $cloth->getId(); ?>">
                        <img src="public/img/uploads/<?= $cloth->getImage(); ?>">
                        <div style="background: linear-gradient(to bottom, #<?= generateRandomColor(); ?> 50%, #<?= generateRandomColor(); ?> 100%);">
                            
                                <h2 style="margin-left: 10px;"><?= $cloth->getTitle(); ?></h2>
                                <p style="margin-left: 10px;"><?= $cloth->getDescription(); ?></p>
                                <div class="social-section" style="margin-left: 10px;">
                                   <i class="fas fa-heart"> <?= $cloth->getLike(); ?></i>
                                   <i class="fas fa-minus-square"> <?= $cloth->getDislike(); ?></i>
                                   
                                </div>
                            
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </section>
            <?php
            function generateRandomColor() {
                $colors = array('00FF00', '00FFFF', 'FF00FF', 'FFFF00', 'FF4500', 'FF1493', 'FF69B4', 'FF8C00', 'FFD700', 'FFA500', 'DC143C', '8B008B');
                $color = $colors[array_rand($colors)];
                return $color;
            }
            ?>

            
        </main>
    </div>
</body>

<template id="project-template">
    <div id="">
        <img src="">
        <div style="background: linear-gradient(to bottom, #<?= generateRandomColor(); ?> 50%, #<?= generateRandomColor(); ?> 100%);">
            
             <h2 style="margin-left: 10px;">title</h2>
             <p style="margin-left: 10px;">description</p>
             <div class="social-section" style="margin-left: 10px;">
                <i class="fas fa-heart"> 0</i>
                <i class="fas fa-minus-square"> 0</i>
             </div>
            
        </div>
    </div>
    
</template>
