let images = [];
function imageSelect() {
    images = [];
    let image = document.querySelector("#image-input").files;
    for (let i = 0; i < image.length; i++) {
        images.push({
            name: image[i].name,
            url: URL.createObjectURL(image[i]),
            file: image[i],
        });
    }

    document.querySelector("#image-preview").innerHTML = imageShow();
    document.querySelector("#image-div").classList.remove("hidden");
}

function imageShow() {
    let image = "";
    images.forEach((i) => {
        image +=
            '<div class="col-span-5 p-2"><figure class="relative"><span class="color-red-600 cursor-pointer absolute top-0 right-0" onclick="imageDelete(' +
            images.indexOf(i) +
            ')"><i class="fas fa-times"></i></span><img class="pt-6" src="' +
            i.url +
            '" alt="">' +
            "</figcaption></figure></div>";
    });

    return image;
}

function imageDelete(e) {
    images.splice(e, 1);
    document.querySelector("#image-preview").innerHTML = imageShow();

    if (images.length === 0) {
        document.querySelector("#image-input").value = [];
        document.querySelector("#image-div").classList.add("hidden");
    }
}
