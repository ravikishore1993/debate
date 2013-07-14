$(document).ready(
    function(){
      $('#for-button').click(function(){
          $.ajax({
           type: "POST",
           url: '/submit',
           data: {'message':$('#for-text').val() , 'side':'for' , 'session':sess,'time':new Date().getTime()}, // serializes the form's elements.
           success: function(data)
           {$('#for-text').val("");
           }
         });
          return false;

  });

      $('#against-button').click(function(){
          $.ajax({
           type: "POST",
           url: '/submit',
           data: {'message':$('#against-text').val() , 'side':'against' , 'session':sess,'time':new Date().getTime()}, // serializes the form's elements.
           success: function(data)
           {
            $('#against-text').val("");
           }
         });
          return false;
  });

setInterval(forcheck,1000);
setInterval(againstcheck,1000);


function forcheck(){
  if($('.lposts div:last-child()').attr('data-id') == undefined ) lid = 0;
  else lid = $('.lposts div:last-child()').attr('data-id');
  $.ajax({
  url: '/for',
  data: {'id':lid,'session':sess},
  success: function(data){console.log(data);
    data = JSON.parse(data);
  for(i=0;i<data.length;i++){
      addLpost(data[i]);
    }
  }
});


}


function againstcheck(){
  if($('.rposts div:last-child()').attr('data-id') == undefined ) rid = 0;
  else rid = $('.rposts div:last-child()').attr('data-id');
  
  $.ajax({
  url: '/against',
  data: {'id':rid,'session':sess},
  success: function(data){console.log(data);
    data = JSON.parse(data);
    for(i=0;i<data.length;i++){
      addRpost(data[i]);
    }

  }
});


}

});

$(document).ready(function(){
  $.yql('select * from boss.search where q="" and sites=#{url} and ck="dj0yJmk9YWF3ODdGNWZPYjg2JmQ9WVdrOWVsWlZNRk5KTldFbWNHbzlNVEEyTURFNU1qWXkmcz1jb25zdW1lcnNlY3JldCZ4PTUz" and secret="a3d93853ba3bad8a99a175e8ffa90a702cd08cfa"',{url:'http://www.ptinews.com'},function(data){
    console.log(data.query.results.bossresponse.web.results.result);
    var arr = data.query.results.bossresponse.web.results.result;
    var r = '<ul>';
    for (var i = 0; i < arr.length; i++) {
      r += "<li><br><div class='news-post-abstract'>"+arr[i].abstract.content+"</div><a href='"+arr[i].clickurl+"'>Link</a><br></li><hr>";
    };
    r += "</ul>";
    $(".news-cont").html(r);
  });
});