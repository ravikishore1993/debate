function addLpost(content){
	var newPost = document.createElement("div");
	var cont = document.createTextNode(content.nick+":" + content.message);
	$(newPost).attr("class","pure-u-1 post");
	$(newPost).attr("data-id",content.id);
	newPost.appendChild(cont);
	$(".lposts .post-content").append(newPost);
	$(newPost).hide();
	$(newPost).slideDown();
	
    $('.lposts .post-content').animate({"scrollTop": $('.lposts .post-content')[0].scrollHeight}, "slow");
}
function addRpost(content){
	var newPost = document.createElement("div");
	var cont = document.createTextNode(content.nick+":"+content.message);
	$(newPost).attr("class","pure-u-1 post");
	$(newPost).attr("data-id",content.id);
	newPost.appendChild(cont);
	$(".rposts .post-content").append(newPost);
	$(newPost).hide();
	$(newPost).slideDown();

    $('.rposts .post-content').animate({"scrollTop": $('.rposts .post-content')[0].scrollHeight}, "slow");
}