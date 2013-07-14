$(document).ready(function(){
  $.yql('select * from boss.search where q="" and sites=#{url} and ck="dj0yJmk9YWF3ODdGNWZPYjg2JmQ9WVdrOWVsWlZNRk5KTldFbWNHbzlNVEEyTURFNU1qWXkmcz1jb25zdW1lcnNlY3JldCZ4PTUz" and secret="a3d93853ba3bad8a99a175e8ffa90a702cd08cfa"',{url:'http://www.ptinews.com'},function(data){
    console.log(data.query.results.bossresponse.web.results.result);
    var arr = data.query.results.bossresponse.web.results.result;
    var r = '<ul>';
    for (var i = 1; i < arr.length; i++) {
      r += "<li><br><div class='news-post-abstract'>"+arr[i].abstract.content+"</div><a href='"+arr[i].clickurl+"'>Source</a><br></li><hr>";
    };
    r += "</ul>";
    $(".news-cont").html(r);
  });

  $("#createRoom").click(function(){
  	window.open("room/"+$("#room").val(),"_self");
  });

  $(".rooms-cont ul li").click(function(){
  	window.open("room/"+$(this).text(),"_self");
  })
});