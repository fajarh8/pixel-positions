<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs/create">
        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" name="salary" placeholder="$200,000"/>
        <x-forms.input label="Location" name="location" placeholder="New York"/>

        <x-forms.select label="Schedule" name="schedule">
            <option value="{{null}}" selected>Select</option>
            <option value="part-time">Part Time</option>
            <option value="full-time">Full Time</option>
        </x-forms>

        <x-forms.input label="URL" name="url" placeholder="https://google.com"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (Comma Separated)" name="tags" placeholder="programmer, designer, education"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
