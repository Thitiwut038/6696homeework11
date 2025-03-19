<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            margin-left: 100px;
            margin-top: 50px;
        }

        h1 {
            /* อันนี้กำหนดส่วนย่อหน้าด้านซ้าย */
   
            /* อันนี้กำหนดส่วนย่อหน้าด้านบน */
            margin-top: 50px;
        }
    </style>
    

    <title>เเก้ไขข้อมูลรถยนต์</title>
</head>

<?php
if(isset($_GET['action_even'])=='edit'){
    $car_id=$_GET['car_id'];
    $sql="SELECT * FROM cars WHERE car_id=$car_id";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
    }else{
        echo"ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
    }
    //$conn->close();
}
?>
<h1>แก้ไขข้อมูลรถยนต์</h1>



<form action="edit_1.php" method="POST">
    <input type="hidden"name="car_id" value="<?php echo$row['car_id']; ?>">
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รหัสรถยนต์ </label>
        <div class="col-sm-2">
            <label class="col-sm-1 col-form-label"> <?php echo$row['car_id']; ?> </label>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> เเบรนด์ </label>
        <div class="col-sm-2">
            <input type="text" name="brand" class="form-control" maxlength="50" value=<?php echo$row['brand']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รุ่น </label>
        <div class="col-sm-2">
            <input type="text" name="model" class="form-control" maxlength="50" value=<?php echo$row['model']; ?> required>
        </div>
    </div>

    
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ปี </label>
        <div class="col-sm-2">
        <select name="year" class="form-select" aria-label="Default select example">
                <option >กรุณาระบุปี</option>
                <option value="2017"<?php if ($row['year']=='2017'){ echo "selected";} ?>>2017</option>
                <option value="2018"<?php if ($row['year']=='2018'){ echo "selected";} ?>>2018</option>
                <option value="2019"<?php if ($row['year']=='2019'){ echo "selected";} ?>>2019</option>
                <option value="2020"<?php if ($row['year']=='2020'){ echo "selected";} ?>>2020</option>
                <option value="2021"<?php if ($row['year']=='2021'){ echo "selected";} ?>>2021</option>
                <option value="2022"<?php if ($row['year']=='2022'){ echo "selected";} ?>>2022</option>
                <option value="2023"<?php if ($row['year']=='2023'){ echo "selected";} ?>>2023</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> สี </label>
        <div class="col-sm-2"> 
            <select name="color" class="form-select" aria-label="Default select example">
                <option >กรุณาระบุสี</option>
                <option value="ดำ"<?php if ($row['color']=='ดำ'){ echo "selected";} ?>>ดำ</option>
                <option value="ขาว"<?php if ($row['color']=='ขาว'){ echo "selected";} ?>>ขาว</option>
                <option value="อื่นๆ"<?php if ($row['color']=='อื่นๆ'){ echo "selected";} ?>>อื่นๆ</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ราคา </label>
        <div class="col-sm-2">
            <input type="text" name="price" class="form-control" maxlength="50" value=<?php echo$row['price']; ?> required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> สถานะ </label>
        <div class="col-sm-2">
        <select name="status" class="form-select" aria-label="Default select example">
                <option >กรุณาระบุสถานะ</option>
                <option value="ใหม่"<?php if ($row['status']=='ใหม่'){ echo "selected";} ?>>ใหม่</option>
                <option value="มือสอง"<?php if ($row['status']=='มือสอง'){ echo "selected";} ?>>มือสอง</option>
            </select>
        </div>
    </div>




    <button type="submit" class="btn btn-primary"> บันทึกข้อมูล</button>
    <button type="reset" class="btn btn-danger"> ยกเลิก</button>

</form>
<br>
    พัฒนาโดย 664485038 นายธิติวุฒิ ศิริทรัพย์ <br>
</head>

</html>