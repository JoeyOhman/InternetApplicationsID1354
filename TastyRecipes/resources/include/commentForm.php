

<?php if (isset($username)) { ?> 

    <div id="commentForm">
        <div>
            <textarea data-bind="value: message" placeholder="Message" maxlength="256"></textarea>
        </div>
        <div>
            <button data-bind="click: postComment">
                Post Comment
            </button>
        </div>
    </div>

<?php } else {
    ?>
    <p>Log in to write a comment.</p>
<?php } 
