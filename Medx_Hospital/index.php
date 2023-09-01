<?php
include('header.php');
?>


    <main>
        <!-- about section -->
        <section id = "about" class = "about py">
            <div class = "about-inner">
                <div class = "container grid">
                    <div class = "about-left text-center">
                        <div class = "section-head">
                            <h2>About Us</h2>
                            <div class = "border-line"></div>
                        </div>
                        <p class = "text text-lg">At Med X , we're more than a hospital – we're your partners in health, dedicated to providing exceptional care, advanced treatments, and a supportive environment that prioritizes your well-being above all. Trust us to journey towards recovery together.</p>
                        <a href = "#" class = "btn btn-white">Learn More</a>
                    </div>
                    <div class = "about-right flex">
                        <div class = "img">
                            <img src = "images/about-img.png">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of about section -->

        <!-- banner one -->
        <section id = "banner-one" class = "banner-one text-center">
            <div class = "container text-white">
                <blockquote class = "lead"><i class = "fas fa-quote-left"></i> When you are young and healthy, it never occurs to you that in a single second your whole life could change. <i class = "fas fa-quote-right"></i></blockquote>
                <small class = "text text-sm">- Anonim Nano</small>
            </div>
        </section>
        <!-- end of banner one -->

        <!-- services section -->
        <section id = "services" class = "services py">
            <div class = "container">
                <div class = "section-head text-center">
                    <h2 class = "lead">The Best Doctor gives the least medicines</h2>
                    <p class = "text text-lg">A perfect way to show your hospital services</p>
                    <div class = "line-art flex">
                        <div></div>
                        <img src = "images/4-dots.png">
                        <div></div>
                    </div>
                </div>
                <div class = "services-inner text-center grid">
                    <article class = "service-item">
                        <div class = "icon">
                            <img src = "images/service-icon-1.png">
                        </div>
                        <h3>Health Consulting</h3>
                        <p class = "text text-sm">
Health consulting is a symphony of compassion and expertise, where dedicated professionals harmonize with the unique cadence of each individual. With a profound understanding of the human body's intricacies, these consultants navigate the labyrinth of health choices, offering a compass that points towards vitality.</p>
                    </article>

                    <article class = "service-item">
                        <div class = "icon">
                            <img src = "images/service-icon-2.png">
                        </div>
                        <h3>Medical Treatment</h3>
                        <p class = "text text-sm">
Medical treatment is a symphony of expertise and care, where practitioners use modern science to unravel the body's mysteries. Guided by knowledge and experience, their healing hands orchestrate a harmonious return to well-being, crafting narratives of rejuvenation with each diagnosis, prescription, and procedure.</p>
                    </article>

                    <article class = "service-item">
                        <div class = "icon">
                            <img src = "images/service-icon-3.png">
                        </div>
                        <h3>Nutritional Consulting</h3>
                        <p class = "text text-sm">
Nutritional consulting celebrates individuality, where dietary needs and preferences form unique brushstrokes. Consultants collaborate, choreographing meals that resonate with body and soul. This partnership is a sanctuary of exploration, unlocking vibrant health through wholesome sustenance's prism.</p>
                    </article>

                    <article class = "service-item">
                        <div class = "icon">
                            <img src = "images/service-icon-4.png">
                        </div>
                        <h3>Medical Advisory</h3>
                        <p class = "text text-sm">Medical advisory blends expertise and compassion, as seasoned professionals use their knowledge to illuminate paths toward optimal health. With deep understanding of medical science and evolving practices, advisors become beacons of insight, instilling security amid uncertainty.</p>
                    </article>
                </div>
            </div>
        </section>
        <!-- end of services section -->

        <!-- banner two section -->
        <section id = "banner-two" class = "banner-two text-center">
            <div class = "container grid">
                <div class = "banner-two-left">
                    <img src = "images/banner-2-img.png">
                </div>
                <div class = "banner-two-right">
                    <p class = "lead text-white">When you are young and healthy, it never occurs to you that in a single second your whole life could change.</p>
                    <div class = "btn-group">
                        <a href = "#" class = "btn btn-white">Learn More</a>
                        <a href = "hms/index.php" class = "btn btn-light-blue">Enter Our HMS</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of banner two section -->

        <!-- doctors section -->
        <section id = "doc-panel" class = "doc-panel py">
            <div class = "container">
                <div class = "section-head">
                    <h2>Our Top Doctors</h2>
                </div>
                <div class="doc-panel-inner grid">
                <?php
$query = "SELECT * FROM doctors WHERE status='Approved' LIMIT 6";
$res = mysqli_query($conn, $query);

while ($docdet = mysqli_fetch_assoc($res)) {
    // Display doctor information here
    ?>
    
        
    
        <div class="doc-panel-item">
                <div class="img flex">
                    <img src="hms/doctor/img/<?php echo $docdet['profile']; ?>" height="450px" alt="doctor image" style="margin-top:20px;">
                    <div class="info text-center bg-blue text-white flex">
                        <p class="lead"><?php echo $docdet['firstname']." ".$docdet['surname']; ?></p>
                    </div>
                </div>
            </div>
        <?php
}
?>
</div>

                
            </div>
        </section>
        <!-- end of doctors section -->




    </main>

    
    <?php
    include('footer.php');
    ?>