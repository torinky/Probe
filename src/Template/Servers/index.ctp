<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('New Server'), ['action' => 'add']); ?></li>
<li><?= $this->Html->link(__('Log Info on this Server'), ['action' => 'updateLog']); ?></li>
<li><?= $this->Html->link(__('List ServersLogs'), ['controller' => 'ServersLogs', 'action' => 'index']); ?></li>
<li><?= $this->Html->link(__('New Servers Log'), ['controller' => 'ServersLogs', 'action' => 'add']); ?></li>
<li><?= $this->Html->link(__('List Storages'), ['controller' => 'Storages', 'action' => 'index']); ?></li>
<li><?= $this->Html->link(__('New Storage'), ['controller' => 'Storages', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th><?= $this->Paginator->sort('id'); ?></th>
        <th><?= $this->Paginator->sort('created'); ?></th>
        <th><?= $this->Paginator->sort('modified'); ?></th>
        <th class="actions"><?= __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($servers as $server): ?>
        <tr>
            <td><?= $this->Number->format($server->id) ?></td>
            <td><?= h($server->created) ?></td>
            <td><?= h($server->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $server->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $server->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $server->id], ['confirm' => __('Are you sure you want to delete # {0}?', $server->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>

<?php

//$this->prepend('script', $this->Html->script(['node_modules/chart.js/dist/Chart.bundle.min.js']));
echo $this->Html->script(['../node_modules/chart.js/dist/Chart.bundle.min.js']);
?>

<canvas id="myChart" width="400" height="400"></canvas>
<script>
  var ctx = document.getElementById("myChart");
  /*
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["赤", "青", "黄", "緑", "紫", "橙"],
        datasets: [{
          label: '得票数',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  */

  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["A", "B", "C", "D", "E", "F", "G"],
      datasets: [{
        label: 'データセットラベル',
        xAxisID: 'x軸その1', // 使用するx軸のID。多軸の場合に指定。
        yAxisID: 'y軸その1', // 使用するy軸のID。多軸の場合に指定。

        data: [12, 19, 3, , 5, 2, 3], // データ列

        backgroundColor: '#ffddcc', // 線の下の塗りつぶし色
        borderColor: '#ff9966', // 線の色
        borderWidth: 2, //線の幅

        borderDash: [0], // ダッシュ線のスタイル。[5, 3]など。
        borderDashOffset: 0, // ダッシュ線のオフセット
        borderCapStyle: 'butt', // 線の端の形状。'butt', 'round', or 'square'
        borderJoinStyle: 'bevel', //線の結合スタイル。'bevel', 'round', or 'miter'

        cubicInterpolationMode: 'default', // キュービック補間モード。'default', or 'monotone'
        fill: 'start', // 塗りつぶしモード
        lineTension: 0.3, // 線のベジェ曲線の張力

        pointBackgroundColor: '#4444cc', //点の塗りつぶしの色
        pointBorderColor: '#8888ff', // 点の境界線の色
        pointBorderWidth: 3, //点の境界線の幅
        pointRadius: 5, // 点の形状の半径
        pointStyle: 'circle', //点のスタイル

        pointHitRadius: 10, // マウスオーバー検出のために点半径に追加される半径(ピクセル単位)。
        pointHoverBackgroundColor: '#44cc44', // マウスオーバー時の点の背景色。
        pointHoverBorderColor: '#88ff88', // マウスオーバー時の点の境界線の色。
        pointHoverBorderWidth: 3, //マウスオーバー時の点の半径。

        showLine: true, // 線を表示する
        spanGaps: true, // データがない点にも線を引く
        steppedLine: false, // 階段グラフ
      }]
    },
    options: {

      scales: {
        yAxes: [{
          id: 'y軸その1', // 軸ID
          ticks: {
            beginAtZero: true
          }
        }],
        xAxes: [{
          id: 'x軸その1', // 軸ID
        }]
      }
    }
  });
</script>
