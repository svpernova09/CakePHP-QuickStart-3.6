<?php
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Widgets/view.ctp with your own version or re-enable debug mode.'
    );
endif;

?>
<div class="col-md-6">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($widgets as $widget): ?>
            <tr>
                <td><?= $widget->name ?></td>
                <td><?= $widget->description ?></td>
                <td><?= $widget->price ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>