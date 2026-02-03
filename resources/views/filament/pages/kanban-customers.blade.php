<x-filament-panels::page>
    <div class="kanban-board">
        <div class="flex gap-4 overflow-x-auto pb-4">
            @foreach($this->getStages() as $stageKey => $stageLabel)
                <div class="flex-shrink-0 w-80">
                    <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold">{{ $stageLabel }}</h3>
                            <span class="bg-gray-200 dark:bg-gray-700 px-2 py-1 rounded-full text-xs">
                                {{ $this->getCustomersByStage($stageKey)->count() }}
                            </span>
                        </div>
                        
                        <div class="space-y-3 min-h-[200px]">
                            @foreach($this->getCustomersByStage($stageKey) as $customer)
                                <div class="bg-white dark:bg-gray-900 rounded-lg p-4 shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow cursor-pointer"
                                     wire:click="$dispatch('openModal', { id: 'edit-customer', record: {{ $customer->id }} })">
                                    <div class="flex items-start justify-between mb-2">
                                        <h4 class="font-semibold text-sm">{{ $customer->name }}</h4>
                                        @if($customer->priority === 1)
                                            <span class="text-red-500 text-xs">High</span>
                                        @elseif($customer->priority === 2)
                                            <span class="text-yellow-500 text-xs">Medium</span>
                                        @else
                                            <span class="text-green-500 text-xs">Low</span>
                                        @endif
                                    </div>
                                    
                                    @if($customer->company)
                                        <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">{{ $customer->company }}</p>
                                    @endif
                                    
                                    @if($customer->email)
                                        <p class="text-xs text-gray-500 dark:text-gray-500">{{ $customer->email }}</p>
                                    @endif
                                    
                                    @if($customer->phone)
                                        <p class="text-xs text-gray-500 dark:text-gray-500">{{ $customer->phone }}</p>
                                    @endif
                                    
                                    <div class="mt-3 flex gap-2">
                                        <a href="{{ route('filament.admin.resources.customers.edit', $customer) }}" 
                                           class="text-xs text-blue-600 hover:text-blue-800">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .kanban-board {
            min-height: 600px;
        }
    </style>
</x-filament-panels::page>
