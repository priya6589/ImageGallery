<!DOCTYPE html>
<html>

<head>
    <title>Image Gallery</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .img-gallery {
            width: 90%;
            margin-bottom: 5px;
        }

        #image-card {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5 text-center">Image Gallery</h1>
        <button class="btn btn-danger float-end" onclick="reload();"><i class="fa fa-refresh"></i></button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
           <i class="fa fa-plus"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Image Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formImg">
                            <div class="form-group">
                            <input type="text" id="imgLink" class="form-control" placeholder="https://images.com/image.jpg">
                            </div>
                            <button type="submit" class="btn btn-primary" id="add">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <div class="row mt-2">
            <!-- Images Collection Box -->
            <div class="col-md-3 form-group">
                <div class="card" style=" max-height: 70%; overflow-y: auto;">
                    <div class="card-body" id="imageCollection">
                        <img class="img-gallery" id="img-gallery" src="img/img_lights.jpg" onclick="myFunction(this);">
                        <img class="img-gallery" id="img-gallery" src="img/img_mountains.jpg" onclick="myFunction(this);">
                        <img class="img-gallery" id="img-gallery" src="img/img_nature.jpg" onclick="myFunction(this);">
                    </div>
                </div>
            </div>

            <!-- Image Show Box -->
            <div class="col-md-6">
                <div class="card image" style="display: none;">
                    <div class="card-body" style="padding: 8.25rem !important;">
                        <img id="image-card">
                    </div>
                    <div class="card-footer text-center">
                        <button type="button" class="btn btn-primary" onclick="rotateImg();"><i class="fa fa-rotate-left"></i></button>
                        <button type="button" class="btn btn-primary" onclick="rotateImgAnti();"><i class="fa fa-rotate-right"></i></button>
                        <button type="button" class="btn btn-primary" onclick="rotateImgUp();"><i class="fa fa-solid fa-caret-up"></i></button>
                        <button type="button" class="btn btn-primary" onclick="rotateImgDown();"><i class="fa fa-caret-down"></i></button>
                    </div>
                </div>

            </div>

            <!-- Image Editor Box-->
            <div class="col-md-3">
                <div class="card img-editor" style="display: none; max-height: 68%; overflow-y: auto;">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Brightness</label>
                            <input id="brightness" class="form-control brightness" type="range" min="50" max="500" value="100">
                        </div>
                        <div class="form-group">
                            <label>Contrast</label>
                            <input id="contrast" class="form-control contrast" type="range" min="50" max="500" value="100">
                        </div>
                        <div class="form-group">
                            <label>Blur</label>
                            <input id="blur" class="form-control blur" type="range" min="0" max="5" value="0">
                        </div>
                        <div class="form-group">
                            <label>Grey</label>
                            <input id="greyScale" class="form-control greyScale" type="range" min="10" max="100" value="10">
                        </div>
                        <!-- <div class="form-group">
                     <label>Invert</label>
                     <input id="invert" class="form-control invert" type="range" min="10" max="500" value="100"> 
                    </div>
                    <div class="form-group">
                     <label>Opacity</label>
                     <input id="opacity" class="form-control opacity" type="range" min="10" max="100" value="30"> 
                    </div> -->
                        <div class="form-group">
                            <label>Saturate</label>
                            <input id="saturate" class="form-control saturate" type="range" min="10" max="500" value="100">
                        </div>
                        <div class="form-group">
                            <label>Hue Rotate</label>
                            <input id="hue-rotate" class="form-control hue-rotate" type="range" min="0" max="360" value="0">
                        </div>
                        <div class="form-group">
                            <label>Sepia</label>
                            <input id="sepia" class="form-control sepia" type="range" min="0" max="100" value="0">
                        </div>
                        <!-- <button class="btn btn-primary" type="reset"  id="reset" value="Reset">Reset</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $("#formImg").submit(function(e){
            var imgLink= $("#imgLink").val();
            //  console.log(imgLink);
            if(imgLink.length)
            {
                $("#image-card").attr('src', imgLink);
            }   
            $(".image").css('display', 'block');
            $(".img-editor").css('display', 'block'); 
            e.preventDefault();
        });

        function myFunction(imgs) {
            var imageBox = document.getElementById("image-card");
            $("#image-card").attr('src', imgs.src);
            $(".image").css('display', 'block');
            $(".img-editor").css('display', 'block');
        }

        function imgEditor() {
            var brightness = $("#brightness").val();
            var contrast = $("#contrast").val();
            var blur = $("#blur").val();
            var grey = $("#greyScale").val();
            var invert = $("#invert").val();
            var opacity = $("#opacity").val();
            var saturate = $("#saturate").val();
            var hue_rotate = $("#hue-rotate").val();
            var sepia = $("#sepia").val();


            $("#image-card").css("filter", `brightness(` + brightness + `%)contrast(` + contrast + `%)blur(` + blur + `px)grayscale(` + grey + `%)saturate(` + saturate + `%)hue-rotate(` + hue_rotate + `deg)sepia(` + sepia + `)`);
            // $("#image-card").css("filter",`invert(`+invert+`%)opacity(`+opacity+`%)`);

        }

        $("input[type='range']").on('change', function() {
            imgEditor();
        });

        function rotateImg() {
            $("#image-card").css("transform", `rotate(90deg)`);
        }

        function rotateImgAnti() {
            $("#image-card").css("transform", `rotate(-90deg)`);
        }

        function rotateImgUp() {
            $("#image-card").css("transform", `rotate(360deg)`);
        }

        function rotateImgDown() {
            $("#image-card").css("transform", `rotate(-180deg)`);
        }

        function reload() {
            location.reload();
        }
    </script>
</body>

</html>