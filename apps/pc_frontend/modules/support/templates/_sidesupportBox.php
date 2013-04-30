<!--
■       ■   ■ ■ ■ ■ ■   ■       ■   ■       
■       ■       ■       ■ ■   ■ ■   ■       
■       ■       ■       ■   ■   ■   ■       
■ ■ ■ ■ ■       ■       ■   ■   ■   ■       
■       ■       ■       ■       ■   ■       
■       ■       ■       ■       ■   ■       
■       ■       ■       ■       ■   ■ ■ ■ ■ ■
-->

<div class="TEST"></div>
<!--
■ ■ ■ ■ ■   ■ ■ ■ ■ ■   ■       ■   ■ ■ ■ ■     ■               ■ ■ ■   ■ ■ ■ ■ ■   ■ ■ ■ ■ ■     ■ ■ ■ 
    ■       ■           ■ ■   ■ ■   ■       ■   ■             ■     ■       ■       ■           ■       ■
    ■       ■           ■   ■   ■   ■       ■   ■           ■       ■       ■       ■           ■       
    ■       ■ ■ ■ ■     ■   ■   ■   ■ ■ ■ ■     ■           ■       ■       ■       ■ ■ ■ ■       ■ ■ ■ 
    ■       ■           ■       ■   ■           ■           ■ ■ ■ ■ ■       ■       ■                   ■
    ■       ■           ■       ■   ■           ■           ■       ■       ■       ■           ■       ■
    ■       ■ ■ ■ ■ ■   ■       ■   ■           ■ ■ ■ ■ ■   ■       ■       ■       ■ ■ ■ ■ ■     ■ ■ ■ 
-->

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
  if(-1 == window.location.href.indexOf("communityTopic/new")){
    return;
  }
  var template = "【質問テンプレート】\n・症状\n日記投稿完了画面で以下のようなエラーメッセージが出て投稿されません。\nhttp://www.ほげ.jp/?m=setup\nを開こうとすると、下記のエラーメッセージが表示されます。\n\nFatal error: Call to undefined function preg_match() in /home/ほげほげ/public_html/OPENPNE/lib/smarty/Smarty.class.php on line 1639\n\nXXさんのブログを参考にしてセットアップしました。\n\n・OpenPNEのバージョン\n[OpenPNE2.14.2 OpenPNE3.6 Beta5]\n\n・運用環境\n[さくらのレンタルサーバースタンダード 自宅サーバ（CentOS5.5）]\n\n・使用ソフトのバージョン\n[PHP5.2.6 MySQL5.1.3 PHP不明 MySQL不明]\n\n・不具合箇所のスクリーンショット\n[ http://p.pne.jp/d/201010041810.png ]\n\n・OpenPNE上に表示されている URL\n[ http://sns.openpne.jp/diary/new ]\n\n・エラーメッセージコピペ\n\nFatal error: Call to undefined function preg_match() in /home/ほげほげ/public_html/OPENPNE/lib/smarty/Smarty.class.php on line 1639\n";

  $('#formCommunityTopic #community_topic_name').addClass("input-block-level");
  $('#formCommunityTopic #community_topic_name').attr("placeholder","◯◯画面で、□□が××できません");


  $('#formCommunityTopic #community_topic_body').val(template);
  $('#formCommunityTopic #community_topic_body').css("height","450px");

});


$('.tag-label').live('click', function() {
  if ($(this).hasClass('label-important')) {
    $.getJSON(openpne.apiBase + 'tag/assign.json?entity=' + $(this).attr('data-entity') + '&tag=' + $(this).attr('data-tag') + '&remove=1&apiKey=' + openpne.apiKey, function(json) {
      console.log(json)
    });
  } else {
    $.getJSON(openpne.apiBase + 'tag/assign.json?entity=' + $(this).attr('data-entity') + '&tag=' + $(this).attr('data-tag') + '&apiKey=' + openpne.apiKey, function(json) {
      console.log(json)
    });
  }
  $(this).toggleClass('label-important');
});

$(document).ready(function() {
  if(-1 == window.location.href.indexOf("communityTopic")){
    return;
  }
  var s = window.location.href;
  var entity = s.split('/').pop();
  entity = "T" + entity;

  var all_tag_list = [];
  $.ajax({
    type: 'GET',
    url: openpne.apiBase + 'tag/list.json',
    dataType: "json",
    data: {"apikey": openpne.apiKey},
    async: false,
    success: function (json){
      all_tag_list = json.data;
    }
  });
  var entity_tag_list = [];
  $.ajax({
    type: 'GET',
    url: openpne.apiBase + 'tag/byentity.json',
    dataType: "json",
    data: {"entity": entity,"apikey": openpne.apiKey},
    async: false,
    success: function (json){
      entity_tag_list = json.data;
    }
  });

  jQuery.each(all_tag_list, function(index, tag) {
    if (-1 != jQuery.inArray(tag,entity_tag_list)) {
      $('.topicDetailBox .title p').append('<span class="tag-label label label-important pull-right" data-entity="'+entity+'" data-tag="' + tag + '">' + tag + '</span>');
    } else {
      $('.topicDetailBox .title p')
      .append('<span class="tag-label label pull-right" data-entity="'+ entity +'" data-tag="' + tag + '">' + tag + '</span>');
    }
    });
});

</script>