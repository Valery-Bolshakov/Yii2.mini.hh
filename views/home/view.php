<div class="container">
    <h3> Работа с моделями </h3>
    <?php
    //после манипуляций в контроллере - можно распечатать массив новый объектов, полученный из таблицы
    //debug($countries);
    //получим все данные из бд и сформируем их в таблицу?>
    <table class="table">
        <?php foreach ($countries as $country): ?>
            <tr><!--
                <td><?/*= $country->code */?></td>
                <td><?/*= $country->name */?></td>
                <td><?/*= $country->population */?></td>-->
                <td><?= $country['code'] ?></td>
                <td><?= $country['name'] ?></td>
                <td><?= $country['population'] ?></td>
                <td><?= $country['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php
    // воспользуемся методом getAt... что бы вывести столбцы из таблицы
/*    debug($model->getAttributes());

    // Протестируем работу связки формы и таблицы, выведем 3 поля ввода с названиями взятыми из колонок таблицы:
    $form = \yii\widgets\ActiveForm::begin(); // Начало формы
    echo $form->field($model, 'code');
    echo $form->field($model, 'name');
    echo $form->field($model, 'population');

    // для создания новых инпутов(если в БД нет соответствующих колонок) - необходимо
    // ввести доп атрибуты(например public $status) в модель(Country):
    echo $form->field($model, 'status');
    \yii\widgets\ActiveForm::end(); // Конец формы*/

    ?>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>