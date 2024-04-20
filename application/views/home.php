<?php
echo $this->session->flashdata('error');
?>

<ul class="collection">
    <?php foreach ($home_post as $data):?>
        <li class="collection-item avatar">
            <img src="<?=site_url("/upload/post/".$data['filename']);?>" class="circle">
            <p class="title""><?= $data['name']; ?></p>
            <small><?= $data['description']?></small>
            <a href="<?= site_url("welcome/index/".$data['id']); ?>"class="secondary content">
                <i class ="material-icons" style= "margin-left: 100px">visibility</i>
            </a>
        </li>
    <?php endforeach; ?>

</ul>
