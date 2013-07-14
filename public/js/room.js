$(document).ready(
    function(){
      var lp = 0;
      var rp = 0;
      $('#for-button').click(function(){
          $.ajax({
           type: "POST",
           url: '/submit',
           data: {'message':$('#for-text').val() , 'side':'for' ,'nick':nick ,'session':sess,'time':new Date().getTime()}, // serializes the form's elements.
           success: function(data)
           {$('#for-text').val("");
           }
         });
          lp++;
          $("#lcomments").text(parseInt($("#lcomments").text())+1);
          return false;

  });

      $('#against-button').click(function(){
          $.ajax({
           type: "POST",
           url: '/submit',
           data: {'message':$('#against-text').val() , 'side':'against','nick':nick , 'session':sess,'time':new Date().getTime()}, // serializes the form's elements.
           success: function(data)
           {
            $('#against-text').val("");
           }
         });
          rp++;
          $("#rcomments").text(parseInt($("#rcomments").text())+1);
          return false;
  });

setInterval(forcheck,1000);
setInterval(againstcheck,1000);


function forcheck(){
  if($('.lposts div div div:last-child()').attr('data-id') == undefined ) lid = 0;
  else lid = $('.lposts div div div:last-child()').attr('data-id');
  $.ajax({
  url: '/for',
  data: {'id':lid,'session':sess},
  success: function(data){
    data = JSON.parse(data);
  for(i=0;i<data.length;i++){
      addLpost(data[i]);
    }
  }
});


}


function againstcheck(){
  if($('.rposts div div div:last-child()').attr('data-id') == undefined ) rid = 0;
  else rid = $('.rposts div div div:last-child()').attr('data-id');
  
  $.ajax({
  url: '/against',
  data: {'id':rid,'session':sess},
  success: function(data){
    data = JSON.parse(data);
    for(i=0;i<data.length;i++){
      addRpost(data[i]);
    }

  }
});


}

});
