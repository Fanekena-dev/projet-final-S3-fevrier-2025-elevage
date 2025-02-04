$(document).ready(function () {
    const dateInput = $('#date-input');
    if (dateInput.val() != null) {
        handleDate();
        handleReset();
    }
});

//////////////////////////////
/// handleDate methods
//////////////////////////////

// 03 Feb 2025
function handleDate() {
    const dateInput = $('#date-input');
    const minDate = new Date('2025-02-03');

    function setDate(date) {
        dateInput.val(date.toISOString().split('T')[0]);
        fetchAnimals(); // Fetch animals when the date changes
    }

    function changeDate(days) {
        let currentDate = new Date(dateInput.val());
        currentDate.setDate(currentDate.getDate() + days);

        // Prevent date from going before 2025-02-03
        if (currentDate < minDate) {
            currentDate = minDate;
        }

        setDate(currentDate);
    }

    // Set initial date
    setDate(minDate);

    $('#increase-day').click(() => changeDate(1));
    $('#decrease-day').click(() => changeDate(-1));

    // Listen for manual date changes
    dateInput.change(() => fetchAnimals());
}

function fetchAnimals() {
    $.ajax({
        url: `${baseUrl}/animals/date`,
        method: `GET`,
        data: { date: $('#date-input').val() },
        success: (animals) => {
            renderAnimals(animals);
        },
        error: function () {
            alert("Failed to fetch animals");
        },
    });
}

function renderAnimals(animals) {
    const section = $('#section2');
    section.html("");

    if (animals.length === 0) {
        section.append(`
            <div class="jumbotron bg-primary-subtle d-flex flex-column align-items-center justify-content-center text-center">
                <i class="fas fa-box-open fa-5x text-secondary"></i>
                <h3 class="mt-3">No animals available</h3>
                <p class="text-muted">Check back later or add new animals.</p>
            </div>
            `);
        return;
    }

    let html = `<div class="animal-list">`;
    animals.forEach(animal => {
        console.log(animals);   
        html += `
            <div class="card animal-card" data-animal-id="${animal.animal_id}">
                <img src="${baseUrl}/public/assets/upload/${animal.pic[0].filename}" alt="${animal.animal_name}">
                <div class="card-body">
                    <h2>${animal.animal_name}</h2>
                    <p>${animal.description}</p>
                </div>
            </div>
        `;
    });

    html += `</div>`;
    section.append(html);
}

//////////////////////////////
/// handleReset methods
//////////////////////////////
function handleReset() {
    $("#reset").click((e)=>{
        e.preventDefault();
        alert("Do you really want to reset ?");
    })
}

