<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 d-none d-md-block sidebar p-3">
            <h2>Logo</h2>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="#section1">Section1</a></li>
                <li class="nav-item"><a class="nav-link" href="#section2">Section2</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="col-md-9 content">
            <!-- Top -->
            <section id="section1">
                <div class="row align-items-center">
                    <!-- Date Selector -->
                    <div class="col-md-9">
                        <div class="card p-3 mb-3 d-flex flex-row justify-content-between align-items-center">
                            <input type="date" id="date-input" class="form-control form-control-lg w-auto">
                            <div class="d-flex align-items-center gap-3">
                                <button id="decrease-day" class="btn btn-outline-primary btn-lg">-1 Day</button>
                                <button id="increase-day" class="btn btn-outline-primary btn-lg">+1 Day</button>
                            </div>
                        </div>
                    </div>

                    <!-- Current Capital -->
                    <div class="col-md-3">
                        <div class="p-3 mb-3 text-center">
                            <h4 class="mb-0">$ <?= number_format(50000) ?> ar</h4>
                        </div>
                    </div>
                </div>
            </section>

            - capital actuel
            - etat de chaque animal
            - efa nikaly sa tsia
            - sinon efa firy andro zay
            - poids
            - fahasalamana
            - stock par aliment
            
            <section class="animal-list" id="section2">
                
            </section>

        </div>
    </div>
</div>