<div class="side-bar d-flex flex-column justify-content-between">
    <div>
        <ul class="d-flex flex-wrap flex-column p-1 py-4 mx-auto list-group ">
            <li class="mb-3 p-2 list-group-item ">
                <a href="{{ route('home') }}" class="text-light text-decoration-none">
                    <i class="fa-solid fa-house text-start fa-fw"></i>
                    <span class=" d-lg-inline mx-2">Home</span>
                </a>
            </li>
        </ul>
        <div class="accordion my-accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button my-accordion" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <i class="fa-solid fa-diagram-project pe-2"></i> Projects
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body ">
                        <ul class="list-group">
                            <li class="list-group-item"><a class="my-accordion"
                                    href="{{ route('admin.projects.index') }}">All Projects</a></li>
                            <li class="list-group-item"><a class="my-accordion"
                                    href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-plus"></i> Create
                                    New
                                    Project </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button my-accordion" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fa-solid fa-microchip pe-2"></i> Categories
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a class="my-accordion"
                                    href="{{ route('admin.categories.index') }}">All Categories</a>
                            </li>
                            <li class="list-group-item"><a class="my-accordion"
                                    href="{{ route('admin.categories.create') }}"><i class="fa-solid fa-plus"></i>
                                    Create New
                                    Category</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button my-accordion" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="fa-solid fa-laptop pe-2"></i> Technologies
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a class="my-accordion"
                                    href="{{ route('admin.technologies.index') }}">All
                                    Technologies</a></li>
                            <li class="list-group-item"><a class="my-accordion"
                                    href="{{ route('admin.technologies.create') }}"><i class="fa-solid fa-plus"></i>
                                    Create New
                                    Technology</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 mx-auto p2">
        <a href="{{ route('admin.dashboard') }}" class="text-light text-decoration-none">
            <i class="fa-solid fa-fw text-start fa-gear pb-3"></i>
            <span class=" d-lg-inline mx-2">Admin</span>
        </a>
    </div>
</div>
