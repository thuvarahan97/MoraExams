<div class="" id="home-section">
    <div id="carouselBanner" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">

        
            <?php if (isset($Sponsors) && !empty($Sponsors) && isset($display_sponsors) && ($display_sponsors == 1)): ?>

            <li data-target="#carouselBanner" data-slide-to="0" class="active"></li>

            <?php endif; ?>

            <?php
            if (isset($Sponsors) && !empty($Sponsors) && isset($display_sponsors) && ($display_sponsors == 1)):
            $count = 0;
            foreach ($Sponsors as $sponsor): if ($sponsor['name'] != '') {
            $count++;
            ?>

            <li data-target="#carouselBanner" data-slide-to="<?=$count?>"></li>
            
            <?php } endforeach; endif; ?>
            
        </ol>
        <div class="carousel-inner" data-stellar-background-ratio="0.5">
            <div class="carousel-item active">
                <div class="d-block w-100" style="background-image: url('images/Banners/bg_home1.jpg'); height: 657px; background-size:cover; background-position: 50% 0;" alt="..."></div>
                <div class="carousel-caption d-md-block custom-caption">
                    <h5>Mora E-Tamils <?=$committeeYear?></h5>
                    <p>University of Moratuwa</p>
                </div>
            </div>

            <?php if (isset($Sponsors) && !empty($Sponsors)) { foreach ($Sponsors as $sponsor): if (isset($sponsor['name']) && ($sponsor['name'] != '')) { ?>

            <div class="carousel-item">
                <div class="d-block w-100" style="background-image: url('images/Banners/bg_home2.jpg'); height: 657px; background-size:cover; background-position: 50% 0;" alt="..."></div>
                <div class="carousel-caption d-md-block custom-caption">

                    <?php if (isset($sponsor['type']) && ($sponsor['type'] != '')): ?>
                    <h5>Our <?=$sponsor['type']?></h5>
                    <?php endif; ?>
                    
                    <?php if (isset($sponsor['name']) && ($sponsor['name'] != '')): ?>
                    <p><?=$sponsor['name']?></p>
                    <?php endif; ?>
                    
                    <?php if (isset($sponsor['logo']) && ($sponsor['logo'] != '')): ?>
                    <img src="images/Sponsors/<?=$sponsor['logo']?>" width="200px"/>
                    <?php endif; ?>
                    
                </div>
            </div>
            
            <?php } endforeach; } ?>

        </div>
    </div>
</div>