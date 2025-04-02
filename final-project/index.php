<?php require './includes/header.php'; ?>
       <section class="masthead">
            <h1>Naturally Landscaping Muskoka</h1>
            <h2>Since 1964</h2>
            <button class="quote"><a href="./pages/quote.php">Get A Quote</a></button>
        </section>

        <section class="welcome">
            <div class="main">
                <div class="left">
                    <h2>Welcome To <strong>Crockford</strong></h2>
                    <img src="./img/green-line.png" class="line">
                    <p>We don’t just work in Muskoka — we’re passionate about it. From creating stunning landscapes to enhancing the beauty of your property, we bring your vision to life using top-quality, locally sourced materials straight from our own pits and quarries.</p>
                </div>
                <div class="right">
                    <!-- Left Arrow Button -->
                    <button class="prev" onclick="prevSlide()">&#10094;</button>
                    
                    <img id="images" src="./img/img-1.jpg" width="700px" height="500px">
                    
                    <!-- Right Arrow Button -->
                    <button class="next" onclick="nextSlide()">&#10095;</button>
                </div>
            </div>
            <h3>Shore to door, we bring your vision to life</h3>
        </section>

        <section class="offer">
            <h2>What we offer</h2>
            <img src="./img/green-line.png" class="line-2">
            <div class="desc">
                <div class="l-c">
                    <img src="./img/lc.jpg">
                    <h3>Landscape Construction</h3>
                    <p>We specialize in designing and creating aesthetically pleasing, sustainable outdoor living spaces.</p>
                </div>
                <div class="mats">
                    <img src="./img/mats.jpg">
                    <h3>Materials</h3>
                    <p>We deliver high-quality materials sourced directly from our licensed pits and quarries.</p>
                </div>
                <div class="s-d">
                    <img src="./img/machine.jpg">
                    <h3>Site Development</h3>
                    <p>We offer site preparation and development services, catering to your home or cottage.</p>
                </div>
                <div class="septic">
                    <img src="./img/sep.jpg">
                    <h3>Septics</h3>
                    <p>We take a meticulous approach to the design, installation, and maintenance of septic systems.</p>
                </div>
            </div>
        </section>

<?php require './includes/footer.php'; ?>
