@component('mail::message')
# Configuration updated: #{{ $configuration->id }}
*Date: {{ $configuration->created_at->format('d.m.Y | H:i:s') }}*
## Device
**Type:** "{{ $configuration->device_type }}" <br>
**Manufacturer:** "{{ $configuration->device_manufacturer }}" <br>
**Model:** "{{ $configuration->device_model }}"
## CPU
**Manufacturer:** "{{ $configuration->cpu_manufacturer }}" <br>
**Model:** "{{ $configuration->cpu_model }}"
## GPU
**Manufacturer:** "{{ $configuration->gpu_manufacturer }}" <br>
**Model:** "{{ $configuration->gpu_model }}" <br>
**Driver:** "{{ $configuration->gpu_driver }}"
## LINUX
**Distribution:** "{{ $configuration->distribution }}" <br>
**Kernel:** "{{ $configuration->kernel }}"
## META
**Comment:** <br>
"{{ $configuration->comment }}"
#[EDIT/DELETE THIS CONFIGURATION]({{ $configuration->editRoute() }})
@endcomponent
