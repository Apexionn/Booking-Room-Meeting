<x-mail::message>
# Booking Rejected
{{-- @DD($data); --}}
Your booking at {{ $data['room_id']}} on {{ $data['booking_date']}} at  {{ $data['time_start'] }} has been rejected. <br> <br>
Reason For Rejection : {{ $data['body']}}. <br>
For more information contact Administrator

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
- Admin
</x-mail::message>
