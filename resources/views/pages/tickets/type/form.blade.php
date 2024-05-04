<div class="row">
    <x-form.input name='name' title='ticket type name' value="{{ old('name', isset($type) ? $type->name : '') }}" />

    <x-form.textarea name='description' title='ticket type descriptoin'
        value="{{ old('description', isset($type) ? $type->description : '') }}" />

    <x-form.input name='image' type='file' title='ticket type image' />

</div>
