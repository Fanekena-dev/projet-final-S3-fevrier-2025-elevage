<!-- Animal detail -->
<div class="modal fade" id="animalModal" tabindex="-1" aria-labelledby="animalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="animalModalLabel">Animal Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Photos Section -->
                    <div class="col-md-7">
                        <!-- Main Image -->
                        <div id="mainPhotoContainer" class="mb-4 text-center">
                            <img id="mainPhoto" src="" class="img-fluid rounded shadow" alt="Main Photo"
                                style="height: 400px; object-fit: cover; width: 100%;">
                        </div>

                        <!-- Thumbnails (Horizontal Scrolling) -->
                        <div id="photoGallery" class="d-flex overflow-auto gap-2"></div>
                    </div>

                    <!-- Animal Info -->
                    <div class="col-md-5">
                        <h3 id="animalName"></h3>
                        <p id="animalDescription"></p>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Species:</strong> <span id="animalSpecies"></span></li>
                            <li class="list-group-item"><strong>Days Without Eating:</strong> <span id="daysWithoutEating"></span></li>
                            <li class="list-group-item"><strong>Weight Loss:</strong> <span id="weightLoss"></span>%</li>
                            <li class="list-group-item"><strong>Current Weight:</strong> <span id="animalWeight"></span> kg</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>