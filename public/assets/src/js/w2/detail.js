$(document).ready(function () {
    $(".animal-card").on("click", function () {
        const animalId = $(this).data("animal-id");

        $.ajax({
            url: `${baseUrl}/animal/`,
            type: "GET",
            data: { id: animalId },
            dataType: "json",
            success: function (data) {
                if (data) {
                    $("#animalName").text(data.animal_name);
                    $("#animalDescription").text(data.description);
                    $("#animalSpecies").text(data.animal_species);
                    $("#daysWithoutEating").text(data.day_without_eating);
                    $("#weightLoss").text(data.weight_loss_percent);
                    $("#animalWeight").text(data.weight);

                    // Check if there are images
                    const hasImages = data.pic && data.pic.length > 0;
                    const defaultImage = `${baseUrl}/public/assets/upload/placeholder.png`;

                    // Update main photo (use the first image or a placeholder)
                    $("#mainPhoto").attr("src", hasImages ? data.pic[0] : defaultImage);

                    // Populate thumbnails
                    let thumbnailsHtml = "";
                    if (hasImages) {
                        data.pic.forEach((photo, index) => {
                            thumbnailsHtml += `
                                <img src="${baseUrl}/public/assets/upload/${photo}" class="clickable-photo rounded shadow ${index === 0 ? 'active-thumbnail' : ''}"
                                    data-photo-url="${photo}" style="height: 80px; cursor: pointer;">
                            `;
                        });
                    } else {
                        // Placeholder thumbnail
                        thumbnailsHtml = `
                            <div class="clickable-photo placeholder-photo rounded shadow"
                                style="height: 80px; width: 80px; background: #aaa; cursor: not-allowed;"></div>
                        `;
                    }
                    $("#photoGallery").html(thumbnailsHtml);

                    $("#animalModal").modal("show");
                }
            },
            error: function () {
                alert("Failed to load animal details.");
            }
        });
    });

    // Update main photo when a thumbnail is clicked
    $(document).on("click", ".clickable-photo", function () {
        const photoUrl = $(this).data("photo-url");
        if (photoUrl) {
            $("#mainPhoto").attr("src", photoUrl);
            $(".clickable-photo").removeClass("active-thumbnail");
            $(this).addClass("active-thumbnail");
        }
    });
});
