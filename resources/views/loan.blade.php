@extends('welcome')

@section('content')
    <div class="flex justify-between">
        <a href="{{ route('lcg.index') }}" class="inline-block rounded bg-slate-400 px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Prev</a>
        <a href="{{ route('check-digit.index') }}" class="inline-block rounded bg-slate-400 px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Next</a>
    </div>
    <br />
    <h2 class="text-slate-300">Please fill any threes field to find out the value.</h2>
    {!! Form::open(['id' => 'calculate_loan', 'class' => 'form-horizontal', 'route' => 'calculate-loan.store']) !!}
        @csrf

        <div class="form-group relative mb-3 xl:w-96">
            {!! Form::number('repayment_amount', null, ['class' => 'peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-white bg-clip-padding py-4 px-3 text-base font-normal leading-tight text-neutral-700 ease-in-out placeholder:text-transparent focus:border-primary focus:bg-white focus:pt-[1.625rem] focus:pb-[0.625rem] focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:bg-neutral-800 dark:text-neutral-200 [&:not(:placeholder-shown)]:pt-[1.625rem] [&:not(:placeholder-shown)]:pb-[0.625rem]', 'placeholder' => 'Repayment Amount', 'step' => 0.01, 'min' => 0, 'onChange' => 'formatNumber(this)']) !!}
            {!! Form::label('repayment_amount', 'Repayment Amount', ['class' => 'pointer-events-none absolute top-0 left-0 origin-[0_0] border border-solid border-transparent py-4 px-3 text-neutral-700 transition-[opacity,_transform] duration-100 ease-in-out peer-focus:translate-x-[0.15rem] peer-focus:-translate-y-2 peer-focus:scale-[0.85] peer-focus:opacity-[0.65] peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:scale-[0.85] peer-[:not(:placeholder-shown)]:opacity-[0.65] motion-reduce:transition-none dark:text-neutral-200 peer-focus:text-neutral-900']) !!}
        </div>
        <div class="form-group relative mb-3 xl:w-96">
            {!! Form::number('principal_amount_borrowed', null, ['class' => 'peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-white bg-clip-padding py-4 px-3 text-base font-normal leading-tight text-neutral-700 ease-in-out placeholder:text-transparent focus:border-primary focus:bg-white focus:pt-[1.625rem] focus:pb-[0.625rem] focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:bg-neutral-800 dark:text-neutral-200 [&:not(:placeholder-shown)]:pt-[1.625rem] [&:not(:placeholder-shown)]:pb-[0.625rem]', 'placeholder' => 'Principal Amount Borrowed', 'step' => 0.01, 'min' => 0, 'onChange' => 'formatNumber(this)']) !!}
            {!! Form::label('principal_amount_borrowed', 'Principal Amount Borrowed', ['class' => 'pointer-events-none absolute top-0 left-0 origin-[0_0] border border-solid border-transparent py-4 px-3 text-neutral-700 transition-[opacity,_transform] duration-100 ease-in-out peer-focus:translate-x-[0.15rem] peer-focus:-translate-y-2 peer-focus:scale-[0.85] peer-focus:opacity-[0.65] peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:scale-[0.85] peer-[:not(:placeholder-shown)]:opacity-[0.65] motion-reduce:transition-none dark:text-neutral-200 peer-focus:text-neutral-900']) !!}
        </div>
        <div class="form-group relative mb-3 xl:w-96">
            {!! Form::number('percentage_rate_per_period', null, ['class' => 'peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-white bg-clip-padding py-4 px-3 text-base font-normal leading-tight text-neutral-700 ease-in-out placeholder:text-transparent focus:border-primary focus:bg-white focus:pt-[1.625rem] focus:pb-[0.625rem] focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:bg-neutral-800 dark:text-neutral-200 [&:not(:placeholder-shown)]:pt-[1.625rem] [&:not(:placeholder-shown)]:pb-[0.625rem]', 'placeholder' => 'Percentage Rate Per Period', 'step' => 0.01, 'min' => 0, 'max' => 100, 'onChange' => 'formatNumber(this)']) !!}
            {!! Form::label('percentage_rate_per_period', 'Percentage Rate Per Period', ['class' => 'pointer-events-none absolute top-0 left-0 origin-[0_0] border border-solid border-transparent py-4 px-3 text-neutral-700 transition-[opacity,_transform] duration-100 ease-in-out peer-focus:translate-x-[0.15rem] peer-focus:-translate-y-2 peer-focus:scale-[0.85] peer-focus:opacity-[0.65] peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:scale-[0.85] peer-[:not(:placeholder-shown)]:opacity-[0.65] motion-reduce:transition-none dark:text-neutral-200 peer-focus:text-neutral-900']) !!}
        </div>
        <div class="form-group relative mb-3 xl:w-96">
            {!! Form::number('number_of_payment', null, ['class' => 'peer m-0 block h-[58px] w-full rounded border border-solid border-neutral-300 bg-white bg-clip-padding py-4 px-3 text-base font-normal leading-tight text-neutral-700 ease-in-out placeholder:text-transparent focus:border-primary focus:bg-white focus:pt-[1.625rem] focus:pb-[0.625rem] focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:bg-neutral-800 dark:text-neutral-200 [&:not(:placeholder-shown)]:pt-[1.625rem] [&:not(:placeholder-shown)]:pb-[0.625rem]', 'placeholder' => 'Number of Payment', 'step' => 1, 'min' => 0, 'onChange' => 'formatNumber(this)']) !!}
            {!! Form::label('number_of_payment', 'Number of Payment', ['class' => 'pointer-events-none absolute top-0 left-0 origin-[0_0] border border-solid border-transparent py-4 px-3 text-neutral-700 transition-[opacity,_transform] duration-100 ease-in-out peer-focus:translate-x-[0.15rem] peer-focus:-translate-y-2 peer-focus:scale-[0.85] peer-focus:opacity-[0.65] peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:scale-[0.85] peer-[:not(:placeholder-shown)]:opacity-[0.65] motion-reduce:transition-none dark:text-neutral-200 peer-focus:text-neutral-900']) !!}
        </div>
        <div class="form-group relative mb-3 xl:w-96">
            <button type="submit" class="inline-block rounded bg-slate-400 px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Calculate</button>
            <button type="reset" class="inline-block rounded bg-slate-400 px-7 pt-3 pb-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Reset</button>
        </div>
    {!! Form::close() !!}

    @if ($result)
        <div class="text-slate-300">
            <h3>{!! $result !!}</h3>
        </div>
    @endif
    @if (session('status'))
        <div class="text-slate-300">
            <h3>{{ session('status') }}</h3>
        </div>
    @endif
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
        });

        function formatNumber(e) {
            if (e.value) {
                if (e.name === 'percentage_rate_per_period') {
                    if (e.value > 100) {
                        $(e).val(parseFloat(e.max).toFixed(2));
                    } else if (e.value < 0) {
                        $(e).val(parseFloat(e.min).toFixed(2));
                    } else {
                        $(e).val(parseFloat(e.value).toFixed(2));
                    }
                } else if (e.name === 'number_of_payment') {
                    $(e).val(parseInt(e.value));
                } else {
                    $(e).val(parseFloat(e.value).toFixed(2));
                }
            } else {
                $(e).val();
            }
        }
    </script>
@endsection