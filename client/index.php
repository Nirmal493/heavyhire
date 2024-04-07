<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script defer src="./assets/script.js"></script>
    <title>HeavyHire</title>
</head>

<body>
    <?php include 'navbar.php' ?>

    <section id="main__cta">
        <div class="container">
            <div class="split">
                <div class="main__cta__rectangle bg-light">
                    <div class="split main__cta__options">

                        <div class="main__cta__card">
                        <img src="https://www.uber-assets.com/image/upload/v1542252540/assets/6d/87af17-3970-4d01-8936-1b0ba102ea6e/original/car-front-outlined.svg"
                                alt="" />
                            top rated drivers
                        </div>
                        <div class="main__cta__card">
                            <img src="https://www.uber-assets.com/image/upload/v1542252540/assets/6d/87af17-3970-4d01-8936-1b0ba102ea6e/original/car-front-outlined.svg"
                                alt="" />
                            rent your fleet
                        </div>
                    </div>
                    <div class="main__cta__text">
                        <h1>Request a top rated driver now</h1>
                        <p class="sous-titre">
                            register to become a driver
                        </p>
                        <a href="signup.php" class="btn">click here to register</a>

                    </div>
                </div>
                <div></div>
            </div>
        </div>
    </section>



    <section data-aos="zoom-in" id="engagements__section" class="bg-light">
        <div class="container">
            <h3>Wherever you go, your safety is our priority</h3>
            <div class="split">
                <div class="engagements__section__flex">
                    <img src="images/pexels-world-sikh-organization-of-canada-14797990.jpg"
                        alt="" />
                    <h4>Our commitment to your safety</h4>
                    <p class="sous-titre">
                        Each of our security features and our Community Guidelines help create a safe environment for
                        our users.
                    </p>

                </div>
                <div class="engagements__section__flex">
                    <img src="images/pexels-ivan-188679.jpg"
                        alt="" />
                    <h4>top rated drivers at your fingertip</h4>
                    <p class="sous-titre">
                        the list is updated every week
                    </p>

                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-up" id="infos__section" class="bg-light">
        <div class="container">
            <div class="split">
                <div class="infos__section__card">
                    <img src="https://www.uber-assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542256135/assets/dd/c53d7b-8921-4dc7-93f4-45fb59f4ffb9/original/person-multiple-outlined.svg"
                        alt="" />
                    <p class="titre">In regards to</p>
                    <p class="sous-titre">
                        Discover our history, our motivations and our world of opportunities.
                    </p>
                    <a href="#" class="text-cta">Learn more</a>
                </div>
                <div class="infos__section__card">
                    <img src="https://www.uber-assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542254244/assets/eb/68c631-5041-4eeb-9114-80048a326782/original/document-outlined.svg"
                        alt="" />
                    <p class="titre">media</p>
                    <p class="sous-titre">
                        Follow the news of our features, initiatives and partnerships.
                    </p>
                    <a href="#" class="text-cta">Learn more</a>
                </div>
                <div class="infos__section__card">
                    <img src="https://www.uber-assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542255370/assets/64/58118a-0ece-4f80-93ee-8041b53593d5/original/home-outlined.svg"
                        alt="" />
                    <p class="titre">Citizens of the world</p>
                    <p class="sous-titre">
                        Find out what we are doing to have a positive impact in the cities we serve.
                    </p>
                    <a href="#" class="text-cta">Learn more</a>
                </div>
            </div>
        </div>
    </section>

    <section id="applications__section">
        <div class="container">
            <h3>Find even more features in our applications</h3>
            <div class="split">
                <a data-aos="fade-right" href="#" class="app__card">
                    <span>HeavyHire</span>
                    <p class="app__titre">
                        download the app for driver
                    </p>
                </a>
                <a data-aos="fade-left" href="#" class="app__card">
                    <span>HeavyHire</span>
                    <p class="app__titre">download the app for user</p>
                </a>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script>
        AOS.init();
    </script>
</body>

</html>