

<ul data-bind="foreach: comments" class="comments">
    <li>
        <h3 data-bind="text: username" class="leftHeader"></h3>
        <p data-bind="text: message"></p>
        <!-- ko if: isAuthor -->
        
        <button id='deleteButton' data-bind="click: $parent.deleteComment.bind($data, id)">
            Delete Comment
        </button>

        <!-- /ko -->
    </li>
</ul>