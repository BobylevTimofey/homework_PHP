<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заполнение формы для получия заявки на расчет</title>
</head>
<body>
<h1>Заявка на расчет</h1>
<form method="POST" action="/create">
    <div>
        <label for="age">Возраст</label>
        <?php if(!empty($errors) && isset($errors['age']) ): ?>
            <span style="color:red"><?php echo $errors['age'] ?></span>
        <?php endif; ?>
        <input type="number" name="application[age]" id="age" value="18" step="1" autofocus>
    </div>
    <div>
        <span>Зарплатный клиент банка</span>
        <label for="client">
            <input type="checkbox" name="client" value="да" id="client">да
        </label>
    </div>
    <div>
        <label for="cost">Стоимость недвижимости</label>
        <?php if(!empty($errors) && isset($errors['cost']) ): ?>
            <span style="color:red"><?php echo $errors['cost'] ?></span>
        <?php endif; ?>
        <input type="number" name="application[cost]" id="cost" step="1000000" value="0" >
    </div>
    <div>
        <label for="initial payment">Первоначальный взнос</label>
        <?php if(!empty($errors) && isset($errors['initial payment']) ): ?>
            <span style="color:red"><?php echo $errors['initial payment'] ?></span>
        <?php endif; ?>
        <input type="number" name="application[initial payment]"
               step="1000000" value="0" id="initial payment" >
    </div>
    <div>
        <label for="time">Срок кридитования</label>
        <?php if(!empty($errors) && isset($errors['time']) ): ?>
            <span style="color:red"><?php echo $errors['time'] ?></span>
        <?php endif; ?>
        <input type="number" name="application[time]" id="time" value="36" step="1">
    </div>
    <div>
        <label for="type house">Тип жилья</label>
        <select name="type house" id="type house">
            <option value="Жилое">Жилое</option>
            <option value="Нежилое">Нежилое</option>
        </select>
    </div>
    <button type="submit">Отправить</button>
</form>
</body>
</html>
