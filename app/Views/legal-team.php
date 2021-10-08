<img src="<?= base_url('assets/imgs/site/law.jpg') ?>" width="100%" height="350px" class="img-responsive"/>
<div class="container-fluid mt-5 bg-pink">
    <h3 class="font-weight-bold text-center text-light" text-light>Meet Our Attorneys</h3>
    <div class="row mt-2">
        <?php foreach($staff as $s): ?>
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <div class="card card-body shadow team-member-card">
                        <img src="<?= $s['img_url'] ?>" class="card-img-top" alt="sample team"/>
                        <p><i><?= $s['fname'] . " " . $s['lname'] ?></i></p>
                        <span class="font-weight-bold"><?= $s['position'] ?></span>
                        <hr/>
                        <span class="text-muted"><?= $s['qualification'] ?></span>
                    </div>
                </div>
        <?php endforeach ?>
                
    </div>
</div>