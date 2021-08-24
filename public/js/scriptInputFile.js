//************************* Image 1 ******** */
const inpFile1 = document.getElementById('inpFile1');
inpFile1.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader1 = new FileReader();
        reader1.addEventListener("load", function () {
            document.getElementById('prvImage1').style.backgroundImage = "url('" + this.result + "')";
        });
        reader1.readAsDataURL(file);
    } else {
        document.getElementById('prvImage1').style.display = null;
        document.getElementById('prvImage1').style.backgroundImage = "";
    }
});
$("#inpFile1").change(function () {
    document.getElementById('toolsImage1').style.visibility = "visible";
    document.getElementById('toolInput1').style.visibility = "hidden";
});

//************************* Image 2 ******** */
const inpFile2 = document.getElementById('inpFile2');
inpFile2.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader1 = new FileReader();
        reader1.addEventListener("load", function () {
            document.getElementById('prvImage2').style.backgroundImage = "url('" + this.result + "')";
        });
        reader1.readAsDataURL(file);
    } else {
        document.getElementById('prvImage2').style.display = null;
        document.getElementById('prvImage2').style.backgroundImage = "";
    }
});
$("#inpFile2").change(function () {
    document.getElementById('toolsImage2').style.visibility = "visible";
    document.getElementById('toolInput2').style.visibility = "hidden";
});

//************************* Image 3 ******** */
const inpFile3 = document.getElementById('inpFile3');
inpFile3.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader1 = new FileReader();
        reader1.addEventListener("load", function () {
            document.getElementById('prvImage3').style.backgroundImage = "url('" + this.result + "')";
        });
        reader1.readAsDataURL(file);
    } else {
        document.getElementById('prvImage3').style.display = null;
        document.getElementById('prvImage3').style.backgroundImage = "";
    }
});
$("#inpFile3").change(function () {
    document.getElementById('toolsImage3').style.visibility = "visible";
    document.getElementById('toolInput3').style.visibility = "hidden";
});

//************************* Image 4 ******** */
const inpFile4 = document.getElementById('inpFile4');
inpFile4.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader1 = new FileReader();
        reader1.addEventListener("load", function () {
            document.getElementById('prvImage4').style.backgroundImage = "url('" + this.result + "')";
        });
        reader1.readAsDataURL(file);
    } else {
        document.getElementById('prvImage4').style.display = null;
        document.getElementById('prvImage4').style.backgroundImage = "";
    }
});
$("#inpFile4").change(function () {
    document.getElementById('toolsImage4').style.visibility = "visible";
    document.getElementById('toolInput4').style.visibility = "hidden";
});

//************************* Image 5 ******** */
const inpFile5 = document.getElementById('inpFile5');
inpFile5.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader1 = new FileReader();
        reader1.addEventListener("load", function () {
            document.getElementById('prvImage5').style.backgroundImage = "url('" + this.result + "')";
        });
        reader1.readAsDataURL(file);
    } else {
        document.getElementById('prvImage5').style.display = null;
        document.getElementById('prvImage5').style.backgroundImage = "";
    }
});
$("#inpFile5").change(function () {
    document.getElementById('toolsImage5').style.visibility = "visible";
    document.getElementById('toolInput5').style.visibility = "hidden";
});
