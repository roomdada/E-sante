<div>
    <form wire:submit.prevent='submit'>
        {{ $this->form }}
        <div class='flex float-right mt-6'>
            <button type="submit"
                class='bg-green-900 btn px-4 py-2 rounded-xl text-white uppercase mb-6'>Enregistrer</button>
        </div>
    </form>
</div>
