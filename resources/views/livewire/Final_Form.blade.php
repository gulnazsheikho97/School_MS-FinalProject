<div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    @if ($currentStep != 3)
   <div style="display: none" class="row setup-content" id="step-3">
       @endif

       <div class="col-xs-12">
               <br>

               <input type="hidden" wire:model="Parent_id">

               <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                       wire:click="back(2)">{{ trans('Parent_trans.Back') }}</button>

               @if($updateMode)
                   <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="submitForm_edit"
                           type="button">{{trans('Parent_trans.Finish')}}
                   </button>
               @else
                   <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                           type="button">{{ trans('Parent_trans.Finish') }}</button>
               @endif

           </div>
       </div>

   </div>


