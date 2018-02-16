$(document).ready(function () {

    var docLoc = location.href;
    var recipe = docLoc.substr(docLoc.lastIndexOf('/') + 1);

    var baseUrl = docLoc.replace(recipe, "");
    var getCommentsUrl = baseUrl + "GetComments";
    var usernameUrl = baseUrl + "GetUsername";
    var postCommentUrl = baseUrl + "PostComment";
    var deleteCommentUrl = baseUrl + "DeleteComment";

    function Comment(id, username, message, isAuthor, recipe) {
        var self = this;
        self.id = id;
        self.username = username;
        self.message = message;
        self.isAuthor = isAuthor;
        self.recipe = recipe;
    }

    function Conversation() {
        var self = this;
        self.comments = ko.observableArray();
        self.message = ko.observable();

        // Needed done before getComments
        $.getJSON(usernameUrl, function (username) {
            self.username = username;
            self.getComments();
        });

        self.getComments = function () {
            $.getJSON(getCommentsUrl, "recipe=" + recipe, function (jsonComments) {
                // Clear old comments
                self.comments.removeAll();
                // Fill observable array with new comments
                for (var i = 0; i < jsonComments.length; i++) {
                    var comment = jsonComments[i];
                    var isAuthor = self.username === comment.username;
                    self.comments.push(new Comment(comment.id, comment.username, comment.message, isAuthor, recipe));
                }
            });
        };

        self.postComment = function () {
            $.post(postCommentUrl, "recipe=" + recipe + "&message=" + ko.toJS(self.message), function () {
                // Update comments on callback to ensure commen is posted before
                self.getComments();
            });
            self.message("");
        };

        self.deleteComment = function (commentId) {
            $.post(deleteCommentUrl, "id=" + commentId, function () {
                self.getComments();
            });
        };
        
    }

    var conversation = new Conversation();
    ko.applyBindings(conversation, document.getElementById('commentContainer'));
});