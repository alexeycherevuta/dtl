@component('mail::message')
# Configuration created: #{{ $configuration->id }}
## Date: {{ $configuration->created_at->format('d.m.Y') }}
### Device
**Type:** "{{ $configuration->device_type }}"
**Manufacturer:** "{{ $configuration->device_manufacturer }}"
**Model:** "{{ $configuration->device_model }}"
### CPU
**Manufacturer:** "{{ $configuration->cpu_manufacturer }}"
**Model:** "{{ $configuration->cpu_model }}"
### GPU
**Manufacturer:** "{{ $configuration->gpu_manufacturer }}"
**Model:** "{{ $configuration->gpu_model }}"
**Driver:** "{{ $configuration->gpu_driver }}"
### LINUX
**Distribution:** "{{ $configuration->distribution }}"
**Kernel:** "{{ $configuration->kernel }}"
### META
**Comment:** "{{ $configuration->comment }}"
### ADMIN LINKS
==========
[DELETE THIS CONFIGURATION]({{ $configuration->deleteUrl }})
==========
==========
[EDIT THIS CONFIGURATION]({{ $configuration->editUrl }})
==========
@endcomponent
