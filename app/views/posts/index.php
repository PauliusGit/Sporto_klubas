<?php require APPROOT . '/views/inc/header.php'; 
var_dump($_SESSION);
?>



    <div class="row">
        <div class="col-md-6">
            <h1>Atsiliepimai</h1>
        </div>
    </div> 
    <?php foreach($data['posts'] as $post): ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <p class="card-title"><?php echo $post->body; ?></p>
            <p class="card-title"><?php echo $post->created_at; ?></p>
        </div>
    <?php endforeach; ?>

    <form action="post">
        <div class="form-group">
            <label for="comment">Jusu komentaras:</label>
            <textarea name="comment" id="" class="form-control form-control-lg" cols="80" rows="10"></textarea>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" value="addComment" class="btn btn-success btn-block mb-5">
            </div>
        </div>
    </form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
