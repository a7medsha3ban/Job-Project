<x-layout>
    <x-breadcrumbs class="mb-4"
                   :links="['Jobs'=>route('jobs.index')]">
    </x-breadcrumbs>
        <x-card class="mb-4 text-sm">
            <form id="filtering-form" action="{{route('jobs.index')}}" method="get">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    {{--   form-id lma troh lel component hatroh camel case formId   --}}
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" form-id="filtering-form"></x-text-input>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From"></x-text-input>
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To"></x-text-input>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="array_combine(array_map('ucfirst',\App\Models\job::$experience),\App\Models\job::$experience)"></x-radio-group>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="array_combine(array_map('ucfirst',\App\Models\job::$category),\App\Models\job::$category)"></x-radio-group>
                </div>
            </div>
            <button class="w-full">Filter</button>
            </form>
    </x-card>
    @foreach($jobs as $job)
        <x-job-card class="mb-4" :job="$job">
            <div>
                <x-link-button :href="route('jobs.show',$job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
