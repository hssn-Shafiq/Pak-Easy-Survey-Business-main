<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Stats') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><strong>User ID:</strong> {{ $userStats->user_id }}</p>
                    <p><strong>Earnings from Referral:</strong> {{ $userStats->earnings }}</p>
                    <p><strong>Earnings from Reviews:</strong> {{ $userStats->reviews()->count() * 10 }}</p>
                    <p><strong>Total Earnings:</strong> {{ $userStats->earnings + $userStats->reviews()->count() * 10 }}</p>
                    <p><strong>Level:</strong> {{ $userStats->level }}</p>

                    @if ($userStats->referral_by)
                        @php
                            $referringUser = App\Models\UserStats::find($userStats->referral_by);
                        @endphp
                        @if ($referringUser)
                            <p><strong>Referred By:</strong> {{ $referringUser->user_id }}</p>
                        @else
                            <p><strong>Referred By:</strong> User not found</p>
                        @endif
                    @else
                        <p><strong>Referred By:</strong> None</p>
                    @endif
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
