<?php require APPROOT . '/views/inc/header.php'; 

?>
<div class="container mb-5">
    <div class="row mt-3">
        <div class="col-md-6">
            <h1>Atsiliepimai</h1>
        </div>
    </div> 

    <div id="commentContainer">
    <?php foreach($data['posts'] as $post): ?>
        <div class="card mt-2" id=''>
                <div class="card-header">
                    <b><?php echo $post->author; ?></b>
                    </div>
                    <div class="card-body">
                    <?php echo $post->comment_body; ?>
                </div>
            <div class="card-footer"><?php echo $post->created_at; ?></div>
        </div>
    <?php endforeach; ?>
    </div>

    <?php if (isset($_SESSION['user_id'])) : ?>
    <form id="commentForm" method="post">
        <div class="form-group mt-5">
            <label for="comment">Jusu komentaras:</label>
            <textarea name="comment" id="comment" class="form-control form-control-lg" cols="80" rows="10"></textarea>
            <span class="invalid-feedback"><?php echo $data['commentErr']; ?></span>
        </div>
        <div class="row mb-5">
            <div class="col">
                <input type="submit" value="Pridėti komentarą" class="btn btn-success btn-block mt-3 mb-5">
            </div>
        </div>
    </form>
    <?php endif; ?>
</div>

    <script>

    const commentForm = document.getElementById('commentForm');
    const commentContainer = document.getElementById('commentContainer');
    const comment = document.getElementById('comment');
    commentForm.addEventListener('submit', addcomment);


    function addcomment(e){
        e.preventDefault();

        const commentData = new FormData(commentForm);
    
        commentData.append('userName', "<?php echo $_SESSION['user_name']; ?>")
        commentData.append('userId', "<?php echo $_SESSION['user_id']; ?>")
        //console.log(commentData)
        document.getElementById('comment').value = ''
        fetch('<?php echo URLROOT . '/API/addComment/'?>', {
                method: 'post',
                body: commentData,
                })
                .then(resp => resp.json())
                .then(data => {
                displayComments();
            })
            .catch(error => console.error(error));
    }


    function displayComments(){
        commentContainer.innerHTML = '';
        fetch('<?php echo URLROOT . '/API/getComments/'?>')
            .then(resp => resp.json())
            .then(data => {
                //mapinsim data kuri ateina
                //pakeisti resp i json
                data.map(item => {
                    commentContainer.innerHTML += `
                    <div class="card mt-2 mb-2" id='${item.user_id}'>
                    <div class="card-header">
                    <b>${item.author}</b>
                    </div>
                    <div class="card-body">
                    ${item.comment_body}
                    </div>
                    <div class="card-footer">${item.created_at}</div>
                    </div>
                    `
                })
        })
    }

    displayComments()
    
    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
