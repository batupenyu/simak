<select name="day" id="day">
    @for ($i = 1; $i <= 31; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>

<select name="month" id="month">
    @for ($i = 1; $i <= 12; $i++)
        <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
    @endfor
</select>

<select name="year" id="year">
    @for ($i = date('Y'); $i >= 1900; $i--)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>