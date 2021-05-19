<div>

<div class="flex justify-center pb-4 py-2">
<h2 class="">Add Steps if requird.</h2>
<i wire:click="increment" class="fas fa-plus-circle px-2 py-1 cursor-pointer"></i>
</a>
</div>

<div class="flex justify-center pb-4 py-5">
@foreach($steps as $step)
<input type="text" name="step[]" class="py-2  border-2 rounded" placeholder="{{'Desktop step'.$step}}"/>
<i class="fa fa-times py-3 px-2 cursor-pointer text-red-400" aria-hidden="true" wire:click="remove({{$loop->index}})"></i>
</div>
@endforeach

</div>
