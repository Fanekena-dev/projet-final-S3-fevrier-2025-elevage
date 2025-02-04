$(document).ready(function () {
    const dateInput = $('#sell-date');
    const minDate = new Date('2025-02-03');  

    setMinDate(minDate);

    function setMinDate(date) {
        dateInput.val(date.toISOString().split('T')[0]);  
    }

    
    dateInput.change(function () {
        let selectedDate = new Date($(this).val());
        
        if (selectedDate < minDate) {
            alert("The selected date is too early. It will be set to the minimum allowed date: 2025-02-03");
            selectedDate = minDate;  
            setMinDate(selectedDate);  
        }

        fetchAnimals(selectedDate.toISOString().split('T')[0]);  
    });

    function fetchAnimals(selectedDate) {
        $.ajax({
            url: `${baseUrl}/animals/date`,
            method: 'GET',
            data: { date: selectedDate },
            success: function (animals) {
                renderAnimals(animals);
            },
            error: function () {
                alert('Failed to fetch animals');
            }
        });
    }

    function renderAnimals(animals) {
        const container = $('#animal-select');
        container.html('');

        if (animals.length === 0) {
            container.append('<p>No animals available for this date.</p>');
            return;
        }

        animals.forEach(animal => {
            const animalCard = `
                <div class="card animal-card" data-animal-id="${animal.animal_id}">
                    <img src="${baseUrl}/public/assets/upload/${animal.pic[0].filename}" style="max-height:100px; max-width:100px;" alt="${animal.animal_name}">
                    <h5>${animal.animal_name}</h5>
                </div>
            `;
            container.append(animalCard);
        });

        $(".animal-card").click(function () {
            const animalId = $(this).data("animal-id");
            $(".animal-card").removeClass("active");
            $(this).addClass("active");
            $("#sell-animal-id").val(animalId);
        });
    }
});
