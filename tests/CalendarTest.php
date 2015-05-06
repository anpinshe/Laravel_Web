<?php

class CalendarTest extends TestCase {
    public function testValidateReturnsFalseIfCalendarNoteIsMissing(){
        $validation = \App\Models\Calendar::validateNewCal([
            'date' => '2015-06-11',
            'weather' => 'sunny'
        ]);
        $this->assertEquals($validation->passes(),false);
    }
    public function testValidateReturnsTrueIfCalendarNoteIsPresent(){
        $validation = \App\Models\Calendar::validateNewCal([
            'date' => '2015-06-11',
            'weather' => 'sunny',
            'note' => 'hahahahha'
        ]);
        $this->assertEquals($validation->passes(),true);
    }
    public function testValidateReturnsFalseIfCalendarDateIsBeforeToday(){
        $validation = \App\Models\Calendar::validateNewCal([
            'date' => '2015-04-11',
            'weather' => 'sunny',
            'note' => 'hahahahha'
        ]);
        $this->assertEquals($validation->passes(),false);
    }
    public function testValidateReturnsTrueIfCalendarDateIsAfterToday(){
        $validation = \App\Models\Calendar::validateNewCal([
            'date' => '2015-09-11',
            'weather' => 'sunny',
            'note' => 'hahahahha'
        ]);
        $this->assertEquals($validation->passes(),true);
    }
}