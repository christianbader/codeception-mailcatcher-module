<?php

namespace Codeception\Util;

class EmailTest extends \Codeception\Test\Unit
{
    public function testGetters()
    {
        $email = new Email(1, ['some@email.com'], 'Some subject', 'Source body');

        $this->assertEquals(1, $email->getId());
        $this->assertEquals(['some@email.com'], $email->getRecipients());
        $this->assertEquals('Some subject', $email->getSubject());
        $this->assertEquals('Source body', $email->getSource());
    }

    public function testCreateFromMailcatcherData()
    {
        $data['Headers']['Subject'][0] = 'Some subject';

        $email = Email::createFromMailcatcherData([
            'ID' => 1,
            'From' => ['some@email.com'],
            'Content' => $data,
            'source' => 'Source body'
        ]);

        $this->assertEquals(1, $email->getId());
        $this->assertEquals(['some@email.com'], $email->getRecipients());
        $this->assertEquals('Some subject', $email->getSubject());
        $this->assertEquals('Source body', $email->getSource());
    }
}
