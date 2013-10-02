<!--
■       ■   ■ ■ ■ ■ ■   ■       ■   ■       
■       ■       ■       ■ ■   ■ ■   ■       
■       ■       ■       ■   ■   ■   ■       
■ ■ ■ ■ ■       ■       ■   ■   ■   ■       
■       ■       ■       ■       ■   ■       
■       ■       ■       ■       ■   ■       
■       ■       ■       ■       ■   ■ ■ ■ ■ ■
-->
<div class="dparts box">
  <div class="parts">


    <a class="btn btn-success btn-block btn-large" href="/communityTopic/new/2"><i class="icon-pencil icon-white"></i>質問する</a>

    <div style="margin: 20px;"></div>

    <a href="#" class="btn btn-primary btn-block disabled">教えてください（HELPME）</a>
    <ul class="unstyled topic_list" data-tag="HELPME" data-tag_minus="CLOSED">
    </ul>

    <div style="margin: 5px;"></div>

    <a href="#" class="btn btn-primary btn-block disabled">バグ（BUG）じゃないの？</a>
    <ul class="unstyled topic_list" data-tag="BUG" data-tag_minus="CLOSED">
    </ul>

    <div style="margin: 5px;"></div>

    <a href="#" class="btn btn-primary btn-block disabled">改善（KAIZEN）案を提案</a>
    <ul class="unstyled topic_list" data-tag="KAIZEN" data-tag_minus="CLOSED">
    </ul>

    <div style="margin: 5px;"></div>

    <a href="#" class="btn btn-primary btn-block disabled">完了（CLOSED）</a>
    <ul class="unstyled topic_list" data-tag="CLOSED" data-tag_minus="">
    </ul>

    <div style="margin: 5px;"></div>

    <a class="btn btn-primary btn-block" href="/communityTopic/recentlyTopicList"><i class="icon-list icon-white"></i>その他のQ&A</a>


  </div>
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
  <li><a href="/communityTopic/${id}">▶${name}</a></li>
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



$(document).ready(function(){
  $('.topic_list').each(function(){
    var tag = $(this).attr('data-tag'); 
    var ul = this;
    var data = openpne.apiBase + 'tag/topic.json?target=community&tag=' + tag + '&apiKey=' + openpne.apiKey;
    if($(this).attr('data-tag_minus')){
      data = data + "&tag_minus=" + $(this).attr('data-tag_minus');
    }

    if($(this).attr('data-tag') == 'CLOSED'){
      data = data + "&count=5";
    }
    $.getJSON(data, function(json) {
      var newdata = new Array();
      jQuery.each(json.data, function() {
        newdata.push(this);
      });
      $html = $('#tmpl_topic_list').tmpl(newdata);
      $(ul).html($html); 
    });
  });
});


</script>