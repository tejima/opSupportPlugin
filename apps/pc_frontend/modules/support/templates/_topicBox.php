<ul class="nav nav-pills nav-stacked">
  <li class="active">
    <a href="#">NEW</a>
  </li>
</ul>
  <div class="block" style="margin-bottom: 20px;">
    <ul id="topic_new" class="articleList">
    </ul>
  </div>

<ul class="nav nav-pills nav-stacked">
  <li class="active">
    <a href="#">ACTIVE</a>
  </li>
</ul>
  <div class="block" style="margin-bottom: 20px;">
    <ul id="topic_active" class="articleList">
    </ul>
  </div>

<ul class="nav nav-pills nav-stacked">
  <li class="active">
    <a href="#">CLOSED</a>
  </li>
</ul>
  <div class="block" style="margin-bottom: 20px;">
    <ul id="topic_closed" class="articleList">
    </ul>
  </div>

  <!--
  ■ ■ ■ ■ ■   ■ ■ ■ ■ ■   ■       ■   ■ ■ ■ ■     ■               ■ ■ ■   ■ ■ ■ ■ ■   ■ ■ ■ ■ ■     ■ ■ ■ 
      ■       ■           ■ ■   ■ ■   ■       ■   ■             ■     ■       ■       ■           ■       ■
      ■       ■           ■   ■   ■   ■       ■   ■           ■       ■       ■       ■           ■       
      ■       ■ ■ ■ ■     ■   ■   ■   ■ ■ ■ ■     ■           ■       ■       ■       ■ ■ ■ ■       ■ ■ ■ 
      ■       ■           ■       ■   ■           ■           ■ ■ ■ ■ ■       ■       ■                   ■
      ■       ■           ■       ■   ■           ■           ■       ■       ■       ■           ■       ■
      ■       ■ ■ ■ ■ ■   ■       ■   ■           ■ ■ ■ ■ ■   ■       ■       ■       ■ ■ ■ ■ ■     ■ ■ ■ 
  -->

  <script id="tmpl_topic_list" type="text/x-jquery-tmpl">
    <li><span class="date">04月09日</span>
    <a href="/communityTopic/${id}">${name}</a></li>
  </script>


  <!--
    ■ ■ ■       ■ ■ ■     ■ ■ ■ ■       ■ ■ ■     ■ ■ ■ ■     ■ ■ ■ ■ ■     ■ ■ ■ 
  ■       ■   ■       ■   ■       ■       ■       ■       ■       ■       ■       ■
  ■           ■           ■       ■       ■       ■       ■       ■       ■       
    ■ ■ ■     ■           ■ ■ ■ ■         ■       ■ ■ ■ ■         ■         ■ ■ ■ 
          ■   ■           ■   ■           ■       ■               ■               ■
  ■       ■   ■       ■   ■     ■         ■       ■               ■       ■       ■
    ■ ■ ■       ■ ■ ■     ■       ■     ■ ■ ■     ■               ■         ■ ■ ■ 
  -->


  <script>
  $(function(){
    $.getJSON( openpne.apiBase + 'topic/search.json?target=community&target_id=2&apiKey=' + openpne.apiKey, function(json) {
      var newdata = new Array();
      jQuery.each(json.data, function() {
        if(Date.parse(this["created_at"]) > new Date().getTime() - 7 * 24 * 60 * 60 * 1000){
          if(this["name"].indexOf("CLOSED") != 0){
            newdata.push(this);
          }
        }
      });
      $html = $('#tmpl_topic_list').tmpl(newdata);
      $('#topic_new').html($html);  
    });



    $.getJSON( openpne.apiBase + 'topic/search.json?target=community&target_id=2&apiKey=' + openpne.apiKey, function(json) {
      var newdata = new Array();
      jQuery.each(json.data, function() {
        if(Date.parse(this["created_at"]) < new Date().getTime() - 7 * 24 * 60 * 60 * 1000){
          if(this["name"].indexOf("CLOSED") != 0){
            newdata.push(this);
          }
        }
      });
      $html = $('#tmpl_topic_list').tmpl(newdata);
      $('#topic_active').html($html); 
    });



    $.getJSON( openpne.apiBase + 'topic/search.json?target=community&target_id=2&keyword=CLOSED&apiKey=' + openpne.apiKey, function(json) {
      $html = $('#tmpl_topic_list').tmpl(json.data);
      $('#topic_closed').html($html); 
    });

  });


  </script>

