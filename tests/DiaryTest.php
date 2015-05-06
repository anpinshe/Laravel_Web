<?php
class DiaryTest extends TestCase {
    public function testValidateReturnsFalseIfDiaryDateIsMissing(){
        $validation = \App\Models\Diary::validateDiary([
            'title' => 'this is a title',
            'diary' => 'this is some text'
        ]);
        $this->assertEquals($validation->passes(),false);
    }
    public function testValidateReturnsTrueIfDiaryDateIsPresent(){
        $validation = \App\Models\Diary::validateDiary([
            'date' => '2014-01-23',
            'title' => 'this is a title',
            'diary' => 'this is some text'
        ]);
        $this->assertEquals($validation->passes(),true);
    }

}