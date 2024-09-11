<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <!-- link awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=EB+Garamond:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <!-- navbar -->
    <?php include "layout/header.html" ?>

    <!-- main -->
    <main class="content">
        <!-- text header -->
        <section id="header" class="section fade-in">
            <div class="text-container">
                <h2>Welcome to Website Technology</h2>
                <h4>This website offers various interesting opportunities!</h4>
                <p>Explore further!</p>

                <a href="#services"> <button class="telusuri">Telusuri</button></a>
            </div>
            <!-- header image -->
            <div class="img-header">
                <img src="assets/img/header.jfif" alt="Header Image">
            </div>
        </section>
        <!-- Section About -->
        <section id="about" class="section fade-in">
            <div class="img-about">
                <img src="assets/img/about.jfif" alt="About Image">
            </div>
            <div class="img-text">
                <h3>Why Choose Us?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto perspiciatis fugit fugiat corporis perferendis debitis.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis recusandae ex earum illo quidem aliquid sunt facere aperiam? Nam, ratione?</p>
                <div class="card-about">
                    <div class="card1">
                        <h2>12k+</h2>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <div class="card1">
                        <h2>12k+</h2>
                        <p>Lorem ipsum dolor sit.</p>
                    </div>
                    <div class="card1">
                        <h2>12k+</h2>
                        <p>dolor sit amet consectetur adipisicing.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section Services -->
        <section id="services" class="section fade-in">
            <div class="row">
                <h2 class="section-heading mb-5">Our Services</h2>
            </div>
            <!-- card services yang ditawarkan -->
            <div class="row">
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-camera-retro"></i>
                        </div>
                        <h3>Photography</h3>
                        <p>We offer photography services including photographers</p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-pen"></i>
                        </div>
                        <h3>Design</h3>
                        <p>We accept design services for various products</p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-computer"></i>
                        </div>
                        <h3>Computer Repair</h3>
                        <p>We offer computer and laptop repair services</p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa-brands fa-wordpress"></i>
                        </div>
                        <h3>Website</h3>
                        <p>We offer website creation services</p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa-brands fa-figma"></i>
                        </div>
                        <h3>UI/UX</h3>
                        <p>We offer UI/UX design services</p>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="icon-wrapper">
                            <i class="fa-regular fa-file"></i>
                        </div>
                        <h3>Reports</h3>
                        <p>We offer report writing services, including papers, PPTs, theses, articles, etc.</p>
                    </div>
                </div>
            </div>
            <!-- end card services -->
        </section>
        <!-- footer -->
        <?php include "layout/footer.html" ?>
    </main>

    <script src="assets/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdeliv