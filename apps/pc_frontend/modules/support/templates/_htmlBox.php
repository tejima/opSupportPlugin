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
    <div class="partsHeading"><h3>Q&Aリスト</h3></div>
    <span class="label label-success">アクティブ</span>
    <ul class="unstyled topic_list" data-tag_id="4">
    </ul>

    <span class="label label-success">バグ</span>
    <ul class="unstyled topic_list" data-tag_id="1">
    </ul>

    <span class="label label-success">機能拡張</span>
    <ul class="unstyled topic_list" data-tag_id="3">
    </ul>

    <span class="label label-success">解決済み</span>
    <ul class="unstyled topic_list" data-tag_id="2">
    </ul>

    <a class="btn btn-primary btn-block" href="/communityTopic/recentlyTopicList"><i class="icon-search icon-white"></i>  その他のQ&A</a>
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
$('.tag-label').live('click', function() {
  if ($(this).hasClass('label-important')) {
    $.getJSON(openpne.apiBase + 'tag/assign.json?entity=' + $(this).attr('data-entity') + '&tag_id=' + $(this).attr('data-tag_id') + '&remove=1&apiKey=' + openpne.apiKey, function(json) {
      console.log(json)
    });
  } else {
    $.getJSON(openpne.apiBase + 'tag/assign.json?entity=' + $(this).attr('data-entity') + '&tag_id=' + $(this).attr('data-tag_id') + '&apiKey=' + openpne.apiKey, function(json) {
      console.log(json)
    });
  }
  $(this).toggleClass('label-important');
});

$(document).ready(function(){
  $('.topic_list').each(function(){
    var tag_id = $(this).attr('data-tag_id'); 
    var ul = this;
    $.getJSON( openpne.apiBase + 'tag/topic.json?target=community&tag_id=' + tag_id + '&apiKey=' + openpne.apiKey, function(json) {
      var newdata = new Array();
      jQuery.each(json.data, function() {
        newdata.push(this);
      });
      $html = $('#tmpl_topic_list').tmpl(newdata);
      $(ul).html($html); 
    });
  });
});


$(document).ready(function(){
  if(-1 == window.location.href.indexOf("communityTopic/new")){
    return;
  }
  var template = "【質問テンプレート】\n・症状\n日記投稿完了画面で以下のようなエラーメッセージが出て投稿されません。\nhttp://www.ほげ.jp/?m=setup\nを開こうとすると、下記のエラーメッセージが表示されます。\n\nFatal error: Call to undefined function preg_match() in /home/ほげほげ/public_html/OPENPNE/lib/smarty/Smarty.class.php on line 1639\n\nXXさんのブログを参考にしてセットアップしました。\n\n・OpenPNEのバージョン\n[OpenPNE2.14.2 OpenPNE3.6 Beta5]\n\n・運用環境\n[さくらのレンタルサーバースタンダード 自宅サーバ（CentOS5.5）]\n\n・使用ソフトのバージョン\n[PHP5.2.6 MySQL5.1.3 PHP不明 MySQL不明]\n\n・不具合箇所のスクリーンショット\n[ http://p.pne.jp/d/201010041810.png ]\n\n・OpenPNE上に表示されている URL\n[ http://sns.openpne.jp/diary/new ]\n\n・エラーメッセージコピペ\n\nFatal error: Call to undefined function preg_match() in /home/ほげほげ/public_html/OPENPNE/lib/smarty/Smarty.class.php on line 1639\n";

  $('#formCommunityTopic textarea').val(template);
});

$(document).ready(function() {
  if(-1 == window.location.href.indexOf("communityTopic")){
    return;
  }
  var s = window.location.href;
  var entity = s.split('/').pop();
  entity = "T" + entity;

  $.getJSON(openpne.apiBase + 'tag/byentity.json?entity=' + entity + '&apiKey=' + openpne.apiKey, function(json) {
    var tag_byentity = json.data;
    console.log(tag_byentity);

    jQuery.each(tag_byentity, function(index, tag) {
      if (tag['assign'] == 1) {
        $('.topicDetailBox .title p').append('<span class="tag-label label label-important pull-right" data-entity="'+entity+'" data-tag_id="' + index + '">' + tag['tag'] + '</span>');
      } else {
        $('.topicDetailBox .title p')
        .append('<span class="tag-label label pull-right" data-entity="'+ entity +'" data-tag_id="' + index + '">' + tag['tag'] + '</span>');
      }
    });
  });
});
</script>