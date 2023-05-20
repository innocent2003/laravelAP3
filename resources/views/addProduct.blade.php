<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <form action="" method="post" enctype="multipart/form-data">
    @csrf
 <input type="text" name="name" placeholder="input name"><br>

<input type="number" name="price" id="" placeholder="input price"><br>
<textarea name="description" id="" cols="30" rows="10">input description</textarea>
<input type="file" name="image1" id="">
<input type="file" name="image2" id="">
<input type="file" name="image3" id="">
<input type="file" name="image4" id="">
@foreach($categories as $item)
   <br> <input type="radio" name="category_id" id="" value="{{$item->id}}"><span>{{$item->name}}</span><br>
@endforeach
<button type="submit">Submit</button>
 </form>
</body>
</html>
